<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        // DEBUG: Check if we can access models
        \Log::info('ProductController@index called');

        try {
            // Try to get products with categories
            $products = Product::with('category')->latest()->paginate(12);
            \Log::info('Products fetched: ' . $products->count());

            // Try to get categories
            $categories = Category::all();
            \Log::info('Categories fetched: ' . $categories->count());

            // DEBUG: Dump data to check
            // Uncomment untuk debug di browser:
            // dd([
            //     'products_count' => $products->count(),
            //     'categories_count' => $categories->count(),
            //     'first_product' => $products->first(),
            //     'first_category' => $categories->first(),
            // ]);

            // Check if view exists
            if (!view()->exists('products.index')) {
                \Log::error('View products.index does not exist!');

                // Return simple response if view doesn't exist
                return response()->json([
                    'error' => 'View not found',
                    'products' => $products->toArray(),
                    'categories' => $categories->toArray(),
                ]);
            }

            return view('products.index', compact('products', 'categories'));

        } catch (\Exception $e) {
            \Log::error('ProductController@index error: ' . $e->getMessage());
            \Log::error('File: ' . $e->getFile() . ' Line: ' . $e->getLine());

            // Return error page
            return response()->view('errors.custom', [
                'message' => 'Error loading products: ' . $e->getMessage(),
                'code' => 500
            ], 500);
        }
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        \Log::info('ProductController@show called for product: ' . $product->id);

        try {
            $relatedProducts = Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->take(4)
                ->get();

            \Log::info('Related products: ' . $relatedProducts->count());

            // DEBUG: Uncomment untuk test
            // dd([
            //     'product' => $product,
            //     'related_count' => $relatedProducts->count(),
            // ]);

            if (!view()->exists('products.show')) {
                \Log::error('View products.show does not exist!');
                return response()->json([
                    'product' => $product,
                    'related_products' => $relatedProducts,
                ]);
            }

            return view('products.show', compact('product', 'relatedProducts'));

        } catch (\Exception $e) {
            \Log::error('ProductController@show error: ' . $e->getMessage());
            return response()->view('errors.custom', [
                'message' => 'Error loading product: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display products by category.
     */
    public function category(Category $category)
    {
        \Log::info('ProductController@category called for category: ' . $category->id);

        try {
            $products = $category->products()->paginate(12);
            $categories = Category::all();

            // DEBUG
            // dd([
            //     'category' => $category,
            //     'products_count' => $products->count(),
            //     'all_categories' => $categories->count(),
            // ]);

            if (!view()->exists('products.category')) {
                \Log::error('View products.category does not exist!');
                return response()->json([
                    'category' => $category,
                    'products' => $products,
                ]);
            }

            return view('products.category', compact('category', 'products', 'categories'));

        } catch (\Exception $e) {
            \Log::error('ProductController@category error: ' . $e->getMessage());
            return response()->view('errors.custom', [
                'message' => 'Error loading category: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search products.
     */
    public function search(Request $request)
    {
        \Log::info('ProductController@search called with query: ' . $request->input('q'));

        try {
            $query = $request->input('q');
            $category_id = $request->input('category');
            $min_price = $request->input('min_price');
            $max_price = $request->input('max_price');

            $products = Product::query();

            if ($query) {
                $products->where('name', 'like', "%{$query}%")
                         ->orWhere('description', 'like', "%{$query}%");
            }

            if ($category_id) {
                $products->where('category_id', $category_id);
            }

            if ($min_price) {
                $products->where('price', '>=', $min_price);
            }

            if ($max_price) {
                $products->where('price', '<=', $max_price);
            }

            $products = $products->paginate(12);
            $categories = Category::all();

            // DEBUG
            // dd([
            //     'search_query' => $query,
            //     'results_count' => $products->count(),
            // ]);

            if (!view()->exists('products.search')) {
                \Log::error('View products.search does not exist!');
                return response()->json([
                    'search_query' => $query,
                    'products' => $products,
                ]);
            }

            return view('products.search', compact('products', 'categories', 'query'));

        } catch (\Exception $e) {
            \Log::error('ProductController@search error: ' . $e->getMessage());
            return response()->view('errors.custom', [
                'message' => 'Error searching products: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * API Search for AJAX requests.
     */
    public function apiSearch(Request $request)
    {
        try {
            $query = $request->input('q');

            $products = Product::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->take(10)
                ->get(['id', 'name', 'slug', 'price', 'discount_price', 'image']);

            return response()->json($products);

        } catch (\Exception $e) {
            \Log::error('ProductController@apiSearch error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * API Filter for AJAX requests.
     */
    public function apiFilter(Request $request)
    {
        try {
            $category_id = $request->input('category');
            $min_price = $request->input('min_price');
            $max_price = $request->input('max_price');
            $sort = $request->input('sort', 'latest');

            $products = Product::query();

            if ($category_id) {
                $products->where('category_id', $category_id);
            }

            if ($min_price) {
                $products->where('price', '>=', $min_price);
            }

            if ($max_price) {
                $products->where('price', '<=', $max_price);
            }

            // Sorting
            switch ($sort) {
                case 'price_low':
                    $products->orderBy('price', 'asc');
                    break;
                case 'price_high':
                    $products->orderBy('price', 'desc');
                    break;
                case 'name':
                    $products->orderBy('name', 'asc');
                    break;
                default:
                    $products->latest();
            }

            $products = $products->paginate(12);

            return response()->json([
                'products' => $products,
                'total' => $products->total(),
            ]);

        } catch (\Exception $e) {
            \Log::error('ProductController@apiFilter error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Simple test method to check if controller is working.
     */
    public function test()
    {
        \Log::info('ProductController@test called');

        return response()->json([
            'status' => 'success',
            'message' => 'ProductController is working!',
            'data' => [
                'products_count' => Product::count(),
                'categories_count' => Category::count(),
                'timestamp' => now(),
            ]
        ]);
    }

    /**
     * Debug method to check database and models.
     */
    public function debug()
    {
        \Log::info('ProductController@debug called');

        try {
            // Test database connection
            $dbConnected = \DB::connection()->getPdo();

            // Test models
            $productModel = Product::first();
            $categoryModel = Category::first();

            // Test relationships
            $productWithCategory = Product::with('category')->first();

            return response()->json([
                'database' => $dbConnected ? 'Connected' : 'Not Connected',
                'products_table_exists' => \Schema::hasTable('products'),
                'categories_table_exists' => \Schema::hasTable('categories'),
                'products_count' => Product::count(),
                'categories_count' => Category::count(),
                'first_product' => $productModel ? $productModel->toArray() : null,
                'first_category' => $categoryModel ? $categoryModel->toArray() : null,
                'product_with_category' => $productWithCategory ? [
                    'product' => $productWithCategory->toArray(),
                    'category' => $productWithCategory->category ? $productWithCategory->category->toArray() : null,
                ] : null,
                'views_exist' => [
                    'products.index' => view()->exists('products.index'),
                    'products.show' => view()->exists('products.show'),
                    'products.category' => view()->exists('products.category'),
                    'products.search' => view()->exists('products.search'),
                ],
                'server' => [
                    'php_version' => phpversion(),
                    'laravel_version' => app()->version(),
                    'environment' => app()->environment(),
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        }
    }
}
