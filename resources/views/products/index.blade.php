<!DOCTYPE html>
<html>
<head>
    <title>Products - SCEILL Parfum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --sceill-primary: #9b59b6;
            --sceill-secondary: #2c3e50;
            --sceill-light: #f8f9fa;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--sceill-light);
        }
        .navbar-brand {
            color: var(--sceill-primary) !important;
            font-weight: 700;
            font-size: 1.8rem;
        }
        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .badge-discount {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            z-index: 10;
        }
        .price {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--sceill-secondary);
        }
        .original-price {
            text-decoration: line-through;
            color: #95a5a6;
            font-size: 0.9rem;
        }
        .btn-sceill {
            background: linear-gradient(45deg, var(--sceill-primary), #8e44ad);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .btn-sceill:hover {
            background: linear-gradient(45deg, #8e44ad, var(--sceill-primary));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(155, 89, 182, 0.3);
            color: white;
        }
        .category-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            border: 2px solid transparent;
        }
        .category-card:hover {
            border-color: var(--sceill-primary);
            transform: translateY(-5px);
        }
        .category-icon {
            font-size: 2.5rem;
            color: var(--sceill-primary);
            margin-bottom: 10px;
        }
        .hero-section {
            background: linear-gradient(135deg, var(--sceill-secondary), #34495e);
            color: white;
            padding: 80px 0;
            border-radius: 0 0 20px 20px;
            margin-bottom: 40px;
        }
        .filter-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <span style="color: #9b59b6;">SCEILL</span> Parfum
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/products">
                            <i class="bi bi-box-seam me-1"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">
                            <i class="bi bi-info-circle me-1"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">
                            <i class="bi bi-telephone me-1"></i> Contact
                        </a>
                    </li>
                </ul>

                <div class="d-flex">
                    <a href="/login" class="btn btn-outline-dark">
                        <i class="bi bi-box-arrow-in-right"></i> Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="display-5 fw-bold mb-3">Our Fragrance Collection</h1>
            <p class="lead mb-4">Discover premium scents crafted with passion and precision</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form class="d-flex">
                        <input type="text" class="form-control form-control-lg me-2"
                               placeholder="Search for scents...">
                        <button class="btn btn-light btn-lg" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3 mb-4">
                <div class="filter-card mb-4">
                    <h5 class="mb-4" style="color: var(--sceill-primary);">
                        <i class="bi bi-filter me-2"></i> Categories
                    </h5>
                    <div class="list-group list-group-flush">
                        <a href="/products" class="list-group-item list-group-item-action border-0 py-3">
                            <i class="bi bi-grid me-2"></i> All Categories
                            <span class="badge bg-light text-dark float-end">6</span>
                        </a>
                        <a href="/products?category=floral" class="list-group-item list-group-item-action border-0 py-3">
                            <i class="bi bi-flower1 me-2"></i> Floral
                            <span class="badge bg-light text-dark float-end">2</span>
                        </a>
                        <a href="/products?category=woody" class="list-group-item list-group-item-action border-0 py-3">
                            <i class="bi bi-tree me-2"></i> Woody
                            <span class="badge bg-light text-dark float-end">1</span>
                        </a>
                        <a href="/products?category=fresh" class="list-group-item list-group-item-action border-0 py-3">
                            <i class="bi bi-brightness-high me-2"></i> Fresh
                            <span class="badge bg-light text-dark float-end">2</span>
                        </a>
                        <a href="/products?category=oriental" class="list-group-item list-group-item-action border-0 py-3">
                            <i class="bi bi-moon-stars me-2"></i> Oriental
                            <span class="badge bg-light text-dark float-end">1</span>
                        </a>
                        <a href="/products?category=gourmand" class="list-group-item list-group-item-action border-0 py-3">
                            <i class="bi bi-cup-straw me-2"></i> Gourmand
                            <span class="badge bg-light text-dark float-end">1</span>
                        </a>
                    </div>
                </div>

                <div class="filter-card">
                    <h5 class="mb-4" style="color: var(--sceill-primary);">
                        <i class="bi bi-tags me-2"></i> Filter by Price
                    </h5>
                    <div class="mb-3">
                        <label class="form-label">Price Range</label>
                        <input type="range" class="form-range" min="0" max="1000000" step="50000">
                        <div class="d-flex justify-content-between">
                            <small>Rp 0</small>
                            <small>Rp 1,000,000</small>
                        </div>
                    </div>

                    <h6 class="mt-4 mb-3">Fragrance Notes</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="citrus">
                        <label class="form-check-label" for="citrus">Citrus</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="floral">
                        <label class="form-check-label" for="floral">Floral</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="woody">
                        <label class="form-check-label" for="woody">Woody</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="spicy">
                        <label class="form-check-label" for="spicy">Spicy</label>
                    </div>

                    <button class="btn btn-sceill w-100">
                        <i class="bi bi-funnel"></i> Apply Filters
                    </button>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="col-lg-9">
                <!-- Sort and View Options -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="mb-0">All Products</h3>
                        <p class="text-muted mb-0">Showing 6 premium fragrances</p>
                    </div>
                    <div class="d-flex gap-3">
                        <select class="form-select w-auto">
                            <option>Sort by: Featured</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest First</option>
                            <option>Best Selling</option>
                        </select>
                        <div class="btn-group">
                            <button class="btn btn-outline-secondary active">
                                <i class="bi bi-grid"></i>
                            </button>
                            <button class="btn btn-outline-secondary">
                                <i class="bi bi-list"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="row">
                    <!-- Product 1 -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card product-card h-100">
                            <span class="badge-discount">-20%</span>
                            <span class="badge bg-warning" style="position: absolute; top: 15px; left: 15px;">
                                <i class="bi bi-star"></i> Best Seller
                            </span>

                            <img src="https://images.unsplash.com/photo-1541643600914-78b084683601?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                 class="card-img-top"
                                 alt="SCEILL Nocturnal Bloom"
                                 style="height: 250px; object-fit: cover;">

                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-light text-dark mb-2 align-self-start">
                                    <i class="bi bi-flower1 me-1"></i> Floral
                                </span>

                                <h5 class="card-title">SCEILL Nocturnal Bloom</h5>
                                <p class="card-text text-muted small flex-grow-1">
                                    Mysterious floral scent with jasmine and gardenia notes. Perfect for evening elegance.
                                </p>

                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <span class="price">Rp 399,000</span>
                                            <span class="original-price ms-2">Rp 450,000</span>
                                        </div>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> In Stock
                                        </span>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <a href="/product/nocturnal-bloom" class="btn btn-outline-dark">
                                            <i class="bi bi-eye"></i> View Details
                                        </a>
                                        <button class="btn btn-sceill">
                                            <i class="bi bi-cart-plus"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card product-card h-100">
                            <span class="badge bg-info" style="position: absolute; top: 15px; left: 15px;">
                                <i class="bi bi-star-fill"></i> Featured
                            </span>

                            <img src="https://images.unsplash.com/photo-1590736969956-6d9c2a8d6975?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                 class="card-img-top"
                                 alt="SCEILL Mystic Woods"
                                 style="height: 250px; object-fit: cover;">

                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-light text-dark mb-2 align-self-start">
                                    <i class="bi bi-tree me-1"></i> Woody
                                </span>

                                <h5 class="card-title">SCEILL Mystic Woods</h5>
                                <p class="card-text text-muted small flex-grow-1">
                                    Deep woody aroma with patchouli and cedarwood. Masculine and mysterious.
                                </p>

                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <span class="price">Rp 520,000</span>
                                        </div>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> In Stock
                                        </span>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <a href="/product/mystic-woods" class="btn btn-outline-dark">
                                            <i class="bi bi-eye"></i> View Details
                                        </a>
                                        <button class="btn btn-sceill">
                                            <i class="bi bi-cart-plus"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card product-card h-100">
                            <span class="badge-discount">-15%</span>
                            <span class="badge bg-warning" style="position: absolute; top: 15px; left: 15px;">
                                <i class="bi bi-star"></i> Best Seller
                            </span>

                            <img src="https://images.unsplash.com/photo-1590736969956-6d9c2a8d6975?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                 class="card-img-top"
                                 alt="SCEILL Ocean Breeze"
                                 style="height: 250px; object-fit: cover;">

                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-light text-dark mb-2 align-self-start">
                                    <i class="bi bi-brightness-high me-1"></i> Fresh
                                </span>

                                <h5 class="card-title">SCEILL Ocean Breeze</h5>
                                <p class="card-text text-muted small flex-grow-1">
                                    Fresh sea breeze with citrus notes. Energizing and revitalizing fragrance.
                                </p>

                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <span class="price">Rp 329,000</span>
                                            <span class="original-price ms-2">Rp 380,000</span>
                                        </div>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> In Stock
                                        </span>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <a href="/product/ocean-breeze" class="btn btn-outline-dark">
                                            <i class="bi bi-eye"></i> View Details
                                        </a>
                                        <button class="btn btn-sceill">
                                            <i class="bi bi-cart-plus"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card product-card h-100">
                            <span class="badge bg-info" style="position: absolute; top: 15px; left: 15px;">
                                <i class="bi bi-star-fill"></i> Featured
                            </span>

                            <img src="https://images.unsplash.com/photo-1541643600914-78b084683601?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                 class="card-img-top"
                                 alt="SCEILL Amber Night"
                                 style="height: 250px; object-fit: cover;">

                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-light text-dark mb-2 align-self-start">
                                    <i class="bi bi-moon-stars me-1"></i> Oriental
                                </span>

                                <h5 class="card-title">SCEILL Amber Night</h5>
                                <p class="card-text text-muted small flex-grow-1">
                                    Warm oriental scent with amber and vanilla. Luxurious and sensual fragrance.
                                </p>

                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <span class="price">Rp 550,000</span>
                                        </div>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> In Stock
                                        </span>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <a href="/product/amber-night" class="btn btn-outline-dark">
                                            <i class="bi bi-eye"></i> View Details
                                        </a>
                                        <button class="btn btn-sceill">
                                            <i class="bi bi-cart-plus"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 5 -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card product-card h-100">
                            <span class="badge bg-warning" style="position: absolute; top: 15px; left: 15px;">
                                <i class="bi bi-star"></i> Best Seller
                            </span>

                            <img src="https://images.unsplash.com/photo-1590736969956-6d9c2a8d6975?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                 class="card-img-top"
                                 alt="SCEILL Vanilla Dream"
                                 style="height: 250px; object-fit: cover;">

                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-light text-dark mb-2 align-self-start">
                                    <i class="bi bi-cup-straw me-1"></i> Gourmand
                                </span>

                                <h5 class="card-title">SCEILL Vanilla Dream</h5>
                                <p class="card-text text-muted small flex-grow-1">
                                    Sweet gourmand scent with Madagascar vanilla and white chocolate.
                                </p>

                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <span class="price">Rp 420,000</span>
                                        </div>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> In Stock
                                        </span>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <a href="/product/vanilla-dream" class="btn btn-outline-dark">
                                            <i class="bi bi-eye"></i> View Details
                                        </a>
                                        <button class="btn btn-sceill">
                                            <i class="bi bi-cart-plus"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 6 -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card product-card h-100">
                            <img src="https://images.unsplash.com/photo-1541643600914-78b084683601?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                 class="card-img-top"
                                 alt="SCEILL Citrus Zest"
                                 style="height: 250px; object-fit: cover;">

                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-light text-dark mb-2 align-self-start">
                                    <i class="bi bi-brightness-high me-1"></i> Fresh
                                </span>

                                <h5 class="card-title">SCEILL Citrus Zest</h5>
                                <p class="card-text text-muted small flex-grow-1">
                                    Energizing citrus blend with grapefruit and mandarin. Fresh and vibrant.
                                </p>

                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <span class="price">Rp 350,000</span>
                                        </div>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> In Stock
                                        </span>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <a href="/product/citrus-zest" class="btn btn-outline-dark">
                                            <i class="bi bi-eye"></i> View Details
                                        </a>
                                        <button class="btn btn-sceill">
                                            <i class="bi bi-cart-plus"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Features Section -->
                <div class="row mt-5 pt-5 border-top">
                    <div class="col-md-4 text-center mb-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-truck display-4" style="color: #9b59b6;"></i>
                        </div>
                        <h5>Free Shipping</h5>
                        <p class="text-muted">Free delivery for orders above Rp 500,000</p>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-shield-check display-4" style="color: #9b59b6;"></i>
                        </div>
                        <h5>100% Original</h5>
                        <p class="text-muted">Guaranteed authentic premium fragrances</p>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-arrow-counterclockwise display-4" style="color: #9b59b6;"></i>
                        </div>
                        <h5>Easy Returns</h5>
                        <p class="text-muted">14-day return policy for your satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4 class="mb-3">SCEILL Parfum</h4>
                    <p class="text-white-50">
                        Luxury fragrances crafted with passion and precision.
                        Experience the essence of elegance.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="text-white-50 me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white-50 me-3"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white-50"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/" class="text-white-50 text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="/products" class="text-white-50 text-decoration-none">All Products</a></li>
                        <li class="mb-2"><a href="/about" class="text-white-50 text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="/contact" class="text-white-50 text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Contact Info</h5>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-2">
                            <i class="bi bi-geo-alt me-2"></i> Jakarta, Indonesia
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-envelope me-2"></i> info@sceillparfum.com
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-phone me-2"></i> +62 812 3456 7890
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="bg-white-50 my-4">
            <div class="text-center">
                <p class="text-white-50 mb-0">&copy; 2024 SCEILL Parfum. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add to cart functionality
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.btn-sceill');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Show loading state
                    const originalText = button.innerHTML;
                    button.innerHTML = '<i class="bi bi-hourglass-split"></i> Adding...';
                    button.disabled = true;

                    // Simulate API call
                    setTimeout(() => {
                        // Show success message
                        alert('Product added to cart successfully!');

                        // Restore button
                        button.innerHTML = originalText;
                        button.disabled = false;
                    }, 1000);
                });
            });

            // Price range slider
            const priceSlider = document.querySelector('.form-range');
            if (priceSlider) {
                priceSlider.addEventListener('input', function() {
                    const value = parseInt(this.value);
                    const formattedValue = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(value);

                    // Update display (you could add a display element)
                    console.log('Selected price: ' + formattedValue);
                });
            }
        });
    </script>
</body>
</html>
