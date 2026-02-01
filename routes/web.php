<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ======================= TEST & DEBUG ROUTES (TAMBAHKAN DI ATAS) =======================
// Test route - bypass semua controller (paling aman)
Route::get('/working', function() {
    return response()->json([
        'status' => 'success',
        'message' => 'Server is working!',
        'timestamp' => now(),
        'php_version' => phpversion(),
        'laravel_version' => app()->version(),
    ]);
});

// Test view tanpa layout
Route::get('/simple', function() {
    return view('simple-test');
});

// Test database connection
Route::get('/db-test', function() {
    try {
        \DB::connection()->getPdo();
        return response()->json([
            'status' => 'success',
            'message' => 'Database connected',
            'database' => \DB::connection()->getDatabaseName(),
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
        ], 500);
    }
});

// Test models
Route::get('/models-test', function() {
    try {
        $data = [
            'users_exists' => class_exists('App\Models\User'),
            'products_exists' => class_exists('App\Models\Product'),
            'categories_exists' => class_exists('App\Models\Category'),
            'carts_exists' => class_exists('App\Models\Cart'),
        ];

        return response()->json($data);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

// Test session
Route::get('/session-test', function() {
    session(['test' => 'value']);
    return response()->json([
        'session_id' => session()->getId(),
        'test_value' => session('test'),
        'session_driver' => config('session.driver'),
    ]);
});

// ======================= PUBLIC ROUTES =======================
// Home Page - SEMENTARA gunakan yang sederhana
Route::get('/', function() {
    return view('home.simple');
})->name('home');

// Product Pages (SEMENTARA disable dulu)
// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
// Route::get('/category/{category:slug}', [ProductController::class, 'category'])->name('products.category');

// Product Pages Sederhana
Route::get('/products', function() {
    return "Products page - Coming soon";
});

// About & Contact Pages
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/faq', 'pages.faq')->name('faq');

// Search Products
// Route::get('/search', [ProductController::class, 'search'])->name('products.search');

// ======================= AUTHENTICATION ROUTES =======================
// Login Routes SEDERHANA (tanpa controller dulu)
Route::get('/login', function() {
    return view('auth.simple-login');
})->name('login');

Route::post('/login', function() {
    $credentials = request()->only('email', 'password');

    if ($credentials['email'] === 'admin@sceill.com' && $credentials['password'] === 'admin123') {
        // Set session
        session([
            'user_id' => 1,
            'user_email' => 'admin@sceill.com',
            'is_admin' => true,
            'login_time' => now()
        ]);
        return redirect('/admin/dashboard')->with('success', 'Login successful!');
    }

    return back()->with('error', 'Invalid credentials');
});

// Register Routes SEDERHANA
Route::get('/register', function() {
    return view('auth.simple-register');
})->name('register');

Route::post('/register', function() {
    // Simple registration logic
    return redirect('/login')->with('success', 'Registration successful! Please login.');
});

// Logout
Route::post('/logout', function() {
    session()->flush();
    return redirect('/')->with('success', 'Logged out successfully');
})->name('logout');

// ======================= AUTHENTICATED ROUTES =======================
Route::middleware(['auth.simple'])->group(function () {
    // Simple auth middleware
    // Cart Routes
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', function () {
            return "Cart page - Coming soon";
        })->name('index');
    });

    // Profile Routes
    Route::get('/profile', function () {
        return "Profile page - Coming soon";
    })->name('profile.index');
});

// ======================= ADMIN ROUTES =======================
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        // Cek session sederhana
        if (!session('user_id') || !session('is_admin')) {
            return redirect('/login')->with('error', 'Please login as admin first.');
        }
        return view('admin.simple-dashboard');
    })->name('dashboard');

    // Product Management
    Route::get('/products', function () {
        if (!session('user_id') || !session('is_admin')) {
            return redirect('/login')->with('error', 'Please login as admin first.');
        }
        return view('admin.products.index');
    })->name('products.index');

    // Create Product
    Route::get('/products/create', function () {
        if (!session('user_id') || !session('is_admin')) {
            return redirect('/login')->with('error', 'Please login as admin first.');
        }
        return view('admin.products.create');
    })->name('products.create');

    // Categories
    Route::get('/categories', function () {
        if (!session('user_id') || !session('is_admin')) {
            return redirect('/login')->with('error', 'Please login as admin first.');
        }
        return view('admin.categories.index');
    })->name('categories.index');
});

// ======================= SIMPLE MIDDLEWARE =======================
// Simple auth middleware
Route::macro('simpleAuth', function () {
    return function ($request, $next) {
        if (!session('user_id')) {
            return redirect('/login')->with('error', 'Please login first');
        }
        return $next($request);
    };
});

// Simple admin middleware
Route::macro('simpleAdmin', function () {
    return function ($request, $next) {
        if (!session('is_admin')) {
            return redirect('/')->with('error', 'Access denied. Admin only.');
        }
        return $next($request);
    };
});

// ======================= API ROUTES =======================
Route::prefix('api')->name('api.')->group(function () {
    // Health check
    Route::get('/health', function () {
        return response()->json([
            'status' => 'healthy',
            'timestamp' => now(),
        ]);
    });

    // System info
    Route::get('/info', function () {
        return response()->json([
            'laravel' => app()->version(),
            'php' => phpversion(),
            'server' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
            'environment' => app()->environment(),
        ]);
    });
});

// ======================= FALLBACK ROUTES =======================
// 404 Error Page
Route::fallback(function () {
    return response()->view('errors.simple-404', [], 404);
});

// ======================= CREATE SIMPLE VIEWS =======================
// Script untuk membuat view sederhana (jalankan di terminal)
if (app()->environment('local')) {
    Route::get('/create-test-views', function() {
        // Create simple-test view
        \File::put(resource_path('views/simple-test.blade.php'), '
<!DOCTYPE html>
<html>
<head>
    <title>Test - SCEILL Parfum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card">
        <div class="card-body text-center">
            <h1 class="text-success">✓ System Working</h1>
            <p class="lead">Basic Laravel routing is functional</p>
            <div class="mt-4">
                <a href="/working" class="btn btn-primary">Test JSON API</a>
                <a href="/db-test" class="btn btn-info">Test Database</a>
                <a href="/login" class="btn btn-success">Test Login</a>
            </div>
            <div class="mt-4">
                <pre class="text-start bg-dark text-light p-3 rounded">' . json_encode([
                    'APP_ENV' => env('APP_ENV'),
                    'APP_DEBUG' => env('APP_DEBUG'),
                    'APP_URL' => env('APP_URL'),
                ], JSON_PRETTY_PRINT) . '</pre>
            </div>
        </div>
    </div>
</body>
</html>');

        // Create simple login view
        \File::put(resource_path('views/auth/simple-login.blade.php'), '
<!DOCTYPE html>
<html>
<head>
    <title>Login - SCEILL Parfum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; height: 100vh; display: flex; align-items: center; }
        .login-card { max-width: 400px; margin: auto; }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-card card shadow">
            <div class="card-body p-4">
                <h2 class="text-center mb-4">SCEILL Parfum</h2>
                <h4 class="text-center mb-4">Admin Login</h4>

                @if(session("success"))
                <div class="alert alert-success">{{ session("success") }}</div>
                @endif

                @if(session("error"))
                <div class="alert alert-danger">{{ session("error") }}</div>
                @endif

                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="admin@sceill.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" value="admin123" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                <div class="mt-4 text-center">
                    <small class="text-muted">
                        Default credentials: admin@sceill.com / admin123
                    </small>
                </div>
            </div>
        </div>
    </div>
</body>
</html>');

        // Create simple dashboard
        \File::put(resource_path('views/admin/simple-dashboard.blade.php'), '
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - SCEILL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/admin/dashboard">
                <i class="bi bi-speedometer2"></i> SCEILL Admin
            </a>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quick Stats</h5>
                        <div class="mb-3">
                            <h6>Users</h6>
                            <h2>1</h2>
                        </div>
                        <div class="mb-3">
                            <h6>Products</h6>
                            <h2>0</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Welcome to SCEILL Admin Panel</h3>
                        <p>Logged in as: ' . session('user_email') . '</p>

                        <div class="mt-4">
                            <h5>Quick Actions:</h5>
                            <div class="d-flex gap-2 mt-3">
                                <a href="/admin/products" class="btn btn-primary">
                                    <i class="bi bi-box"></i> Manage Products
                                </a>
                                <a href="/" class="btn btn-outline-secondary">
                                    <i class="bi bi-house"></i> View Site
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>');

        // Create simple home
        \File::put(resource_path('views/home/simple.blade.php'), '
<!DOCTYPE html>
<html>
<head>
    <title>SCEILL Parfum - Luxury Fragrances</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body { font-family: "Segoe UI", sans-serif; }
        .hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
                      url("https://images.unsplash.com/photo-1541643600914-78b084683601?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80");
            background-size: cover; color: white; padding: 100px 0; text-align: center;
        }
        .feature-icon { font-size: 3rem; color: #9b59b6; }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="/" style="color: #9b59b6;">
                SCEILL Parfum
            </a>
            <div class="navbar-nav">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/products">Products</a>
                <a class="nav-link" href="/about">About</a>
                <a class="nav-link" href="/login">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1 class="display-4 mb-3">Experience Luxury with SCEILL</h1>
            <p class="lead mb-4">Crafted with precision, designed for elegance</p>
            <a href="/products" class="btn btn-light btn-lg">Explore Collection</a>
            <a href="/login" class="btn btn-outline-light btn-lg ms-2">Admin Login</a>
        </div>
    </section>

    <!-- Features -->
    <section class="container py-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="feature-icon mb-3">
                    <i class="bi bi-flower1"></i>
                </div>
                <h4>Premium Scents</h4>
                <p>Handcrafted fragrances from finest ingredients</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon mb-3">
                    <i class="bi bi-award"></i>
                </div>
                <h4>Luxury Quality</h4>
                <p>100% authentic and highest quality standards</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon mb-3">
                    <i class="bi bi-truck"></i>
                </div>
                <h4>Free Shipping</h4>
                <p>Free delivery for orders above Rp 500.000</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 SCEILL Parfum. All rights reserved.</p>
            <small class="text-white-50">
                <a href="/test" class="text-white-50">System Status</a> |
                <a href="/working" class="text-white-50">API Test</a>
            </small>
        </div>
    </footer>
</body>
</html>');

        // Create 404 page
        \File::put(resource_path('views/errors/simple-404.blade.php'), '
<!DOCTYPE html>
<html>
<head>
    <title>404 - Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="text-center">
            <h1 class="display-1 text-muted">404</h1>
            <h2 class="mb-4">Page Not Found</h2>
            <p class="lead mb-4">The page you are looking for does not exist.</p>
            <a href="/" class="btn btn-primary">Go Home</a>
            <a href="/login" class="btn btn-outline-secondary">Login</a>
        </div>
    </div>
</body>
</html>');

        return "Test views created successfully!";
    });
}
// ======================= PUBLIC ROUTES =======================
// Home Page
Route::get('/', function() {
    return view('home.simple');
})->name('home');

// Products Page
Route::get('/products', function() {
    return view('products.index');
});

// Single Product Page (placeholder)
Route::get('/product/{slug}', function($slug) {
    return "Product detail page for: " . $slug;
});

// About & Contact Pages
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
