<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'total_users' => User::count(),
            'total_carts' => Cart::count(),
            'featured_products' => Product::where('is_featured', true)->count(),
            'best_sellers' => Product::where('is_best_seller', true)->count(),
            'low_stock' => Product::where('stock', '<', 10)->count(),
            'out_of_stock' => Product::where('stock', 0)->count(),
        ];

        $recent_products = Product::with('category')->latest()->take(5)->get();
        $low_stock_products = Product::where('stock', '<', 10)->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_products', 'low_stock_products'));
    }
}
