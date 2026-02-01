<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCEILL Parfum - {{ $title ?? 'Luxury Fragrances' }}</title>

    <!-- Vite CSS & JS -->
    @if(app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
        <script src="{{ asset('build/assets/app.js') }}" defer></script>
    @endif

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: #2c3e50;
        }

        .sceill-purple {
            color: #000080 !important;
        }

        .hero-section {
            background: linear-gradient(rgba(44, 62, 80, 0.85), rgba(44, 62, 80, 0.9)), url('/images/hero-bg.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
            border-radius: 0 0 20px 20px;
        }

        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            border-radius: 12px;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .badge-discount {
            position: absolute;
            top: 10px;
            right: 10px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 10;
        }

        .price {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .original-price {
            text-decoration: line-through;
            color: #95a5a6;
            font-size: 0.9rem;
        }

        .btn-sceill {
            background: linear-gradient(45deg, #9b59b6, #8e44ad);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-sceill:hover {
            background: linear-gradient(45deg, #8e44ad, #9b59b6);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(155, 89, 182, 0.3);
            color: white;
        }

        .btn-sceill-outline {
            border: 2px solid #9b59b6;
            color: #9b59b6;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-sceill-outline:hover {
            background: #9b59b6;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(155, 89, 182, 0.3);
        }

        .footer {
            background: linear-gradient(45deg, #2c3e50, #34495e);
            color: white;
            margin-top: auto;
            padding-top: 60px;
            padding-bottom: 30px;
        }

        .footer a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: #9b59b6;
        }

        .footer-heading {
            color: white;
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-heading::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 3px;
            background: #9b59b6;
        }

        .social-icons a {
            display: inline-block;
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 36px;
            margin-right: 8px;
            transition: all 0.3s;
        }

        .social-icons a:hover {
            background: #9b59b6;
            transform: translateY(-3px);
        }

        .category-card {
            background: white;
            border-radius: 12px;
            padding: 25px 15px;
            text-align: center;
            transition: all 0.3s;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            height: 100%;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .category-icon {
            font-size: 2.5rem;
            color: #9b59b6;
            margin-bottom: 15px;
        }

        .alert-floating {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1050;
            min-width: 300px;
            animation: slideInRight 0.3s ease-out;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            background: white !important;
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #e74c3c;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-content {
            flex: 1;
            padding-bottom: 50px;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #9b59b6;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #8e44ad;
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Floating Alerts -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show alert-floating" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show alert-floating" role="alert">
        <i class="bi bi-exclamation-triangle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show alert-floating" role="alert">
        <i class="bi bi-exclamation-circle me-2"></i>
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show alert-floating" role="alert">
        <i class="bi bi-x-circle me-2"></i>
        <ul class="mb-0 ps-3">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <span class="sceill-purple">SCEILL</span> Parfum
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('/')) active @endif" href="{{ url('/') }}">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-grid me-1"></i> Koleksi
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{ route('products.category', $category->slug) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('products.index') }}">
                                    <i class="bi bi-arrow-right-circle me-1"></i> Semua Produk
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('products')) active @endif" href="{{ route('products.index') }}">
                            <i class="bi bi-bag me-1"></i> Semua Produk
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-info-circle me-1"></i> Tentang Kami
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-telephone me-1"></i> Kontak
                        </a>
                    </li>

                    @auth
                        @if(auth()->user()->email === 'admin@sceill.com')
                        <li class="nav-item">
                            <a class="nav-link @if(request()->is('admin*')) active @endif" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2 me-1"></i> Admin
                            </a>
                        </li>
                        @endif
                    @endauth
                </ul>

                <!-- Auth & Cart -->
                <div class="d-flex align-items-center gap-3">
                    <!-- Cart Button -->
                    @auth
                    <a href="{{ route('cart.index') }}" class="btn btn-sceill-outline position-relative">
                        <i class="bi bi-cart3"></i> Keranjang
                        @php
                            $cartCount = auth()->user()->carts()->count() ?? 0;
                        @endphp
                        @if($cartCount > 0)
                        <span class="cart-badge">{{ $cartCount }}</span>
                        @endif
                    </a>
                    @endauth

                    <!-- Auth Buttons -->
                    @auth
                        <!-- User Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-sceill dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-2"></i>
                                {{ Str::limit(auth()->user()->name, 15) }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <h6 class="dropdown-header">
                                        <i class="bi bi-person-badge"></i> {{ auth()->user()->name }}
                                    </h6>
                                </li>
                                <li><hr class="dropdown-divider"></li>

                                @if(auth()->user()->email === 'admin@sceill.com')
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="bi bi-speedometer2 me-2"></i> Dashboard Admin
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                @endif

                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-person me-2"></i> Profil Saya
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-heart me-2"></i> Wishlist
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-clock-history me-2"></i> Riwayat Pesanan
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>

                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <!-- Guest Buttons -->
                        <a href="{{ route('login') }}" class="btn btn-sceill-outline">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-sceill">
                            <i class="bi bi-person-plus me-1"></i> Daftar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Brand & Description -->
                <div class="col-lg-4 col-md-6 mb-5">
                    <h3 class="footer-heading">SCEILL Parfum</h3>
                    <p class="mb-4">
                        Luxury fragrances crafted with passion and precision.
                        Experience the essence of elegance with our premium collection
                        of perfumes inspired by nature's finest scents.
                    </p>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-tiktok"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-5">
                    <h3 class="footer-heading">Menu</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/') }}">Home</a></li>
                        <li class="mb-2"><a href="{{ route('products.index') }}">Semua Produk</a></li>
                        <li class="mb-2"><a href="#">Best Sellers</a></li>
                        <li class="mb-2"><a href="#">New Arrivals</a></li>
                        <li class="mb-2"><a href="#">Sale</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div class="col-lg-2 col-md-6 mb-5">
                    <h3 class="footer-heading">Kategori</h3>
                    <ul class="list-unstyled">
                        @foreach($categories as $category)
                        <li class="mb-2">
                            <a href="{{ route('products.category', $category->slug) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4 col-md-6 mb-5">
                    <h3 class="footer-heading">Hubungi Kami</h3>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="bi bi-geo-alt me-2"></i>
                            Jl. Parfum Elegance No. 88, Jakarta Selatan 12560
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-telephone me-2"></i>
                            +62 812-3456-7890
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-whatsapp me-2"></i>
                            +62 812-3456-7890 (WhatsApp)
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-envelope me-2"></i>
                            info@sceillparfum.com
                        </li>
                        <li>
                            <i class="bi bi-clock me-2"></i>
                            Senin - Jumat: 09:00 - 17:00
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="bg-white-50 my-4">

            <!-- Copyright & Payment Methods -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">
                        &copy; 2024 <span class="sceill-purple">SCEILL Parfum</span>. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="payment-methods">
                        <small class="text-white-50 me-2">Metode Pembayaran:</small>
                        <i class="bi bi-credit-card me-2 fs-5"></i>
                        <i class="bi bi-paypal me-2 fs-5"></i>
                        <i class="bi bi-bank me-2 fs-5"></i>
                        <i class="bi bi-cash-coin fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="btn btn-sceill rounded-circle position-fixed bottom-0 end-0 m-4" style="display: none;">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- JavaScript -->
    <script>
        // Back to Top Button
        const backToTop = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.style.display = 'block';
            } else {
                backToTop.style.display = 'none';
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Auto dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert-floating');
            alerts.forEach(alert => {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });

        // Active nav item highlight
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
