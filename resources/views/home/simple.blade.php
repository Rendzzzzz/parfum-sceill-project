<!DOCTYPE html>
<html>
<head>
    <title>SCEILL Parfum - Luxury Fragrances</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body { font-family: "Segoe UI", sans-serif; }
        .hero { 
            background: linear-gradient(rgba(44, 62, 80, 0.85), rgba(44, 62, 80, 0.9));
            color: white; padding: 100px 0; text-align: center;
            border-radius: 0 0 20px 20px;
        }
        .sceill-logo {
            color: #9b59b6;
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .btn-sceill {
            background: linear-gradient(45deg, #9b59b6, #8e44ad);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 1.1rem;
        }
        .feature-icon {
            font-size: 3rem;
            color: #9b59b6;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="/" style="color: #9b59b6;">
                SCEILL
            </a>
            <div class="navbar-nav">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/products">Products</a>
                <a class="nav-link" href="/login">Admin Login</a>
                <a class="nav-link" href="/test">System</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="sceill-logo">SCEILL</div>
            <h1 class="display-5 mb-3">Luxury Fragrances</h1>
            <p class="lead mb-4">Crafted with precision, designed for elegance. Discover your signature scent.</p>
            <a href="/products" class="btn btn-light btn-lg">Explore Collection</a>
            <a href="/login" class="btn btn-sceill btn-lg ms-3">Admin Panel</a>
        </div>
    </section>

    <!-- Features -->
    <section class="container py-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="feature-icon">
                    <i class="bi bi-flower1"></i>
                </div>
                <h4>Premium Scents</h4>
                <p class="text-muted">Handcrafted fragrances from finest ingredients</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon">
                    <i class="bi bi-award"></i>
                </div>
                <h4>Luxury Quality</h4>
                <p class="text-muted">100% authentic and highest quality standards</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon">
                    <i class="bi bi-truck"></i>
                </div>
                <h4>Free Shipping</h4>
                <p class="text-muted">Free delivery for orders above Rp 500.000</p>
            </div>
        </div>
    </section>

    <!-- System Status -->
    <section class="container py-5 border-top">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h3 class="mb-4">System Status</h3>
                <div class="d-flex justify-content-center gap-3">
                    <a href="/working" class="btn btn-outline-primary">
                        <i class="bi bi-check-circle"></i> API Test
                    </a>
                    <a href="/db-test" class="btn btn-outline-success">
                        <i class="bi bi-database"></i> Database Test
                    </a>
                    <a href="/login" class="btn btn-outline-secondary">
                        <i class="bi bi-box-arrow-in-right"></i> Admin Login
                    </a>
                </div>
                <div class="mt-4">
                    <small class="text-muted">
                        Default admin: admin@sceill.com / admin123
                    </small>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 SCEILL Parfum. All rights reserved.</p>
            <small class="text-white-50">
                Luxury Fragrances • Premium Quality • Exclusive Scents
            </small>
        </div>
    </footer>
</body>
</html>
