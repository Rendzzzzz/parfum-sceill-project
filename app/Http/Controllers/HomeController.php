<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Ambil featured products dengan aman
            $featuredProducts = Product::where('is_featured', true)->take(4)->get();

            // Ambil best sellers
            $bestSellers = Product::where('is_best_seller', true)->take(4)->get();

            // Ambil categories dengan error handling
            $categories = [];
            if (class_exists('App\Models\Category') && \Schema::hasTable('categories')) {
                $categories = Category::all();
            }

            return view('home.index', compact('featuredProducts', 'bestSellers', 'categories'));

        } catch (\Exception $e) {
            // Jika error, tampilkan halaman tanpa data
            \Log::error('HomeController error: ' . $e->getMessage());

            return view('home.index', [
                'featuredProducts' => collect([]),
                'bestSellers' => collect([]),
                'categories' => collect([]),
            ]);
        }
    }
}
