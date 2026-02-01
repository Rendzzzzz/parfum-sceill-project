<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - SCEILL Parfum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --sceill-primary: #9b59b6;
            --sceill-secondary: #2c3e50;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background: white;
            min-height: 100vh;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
            position: fixed;
            width: 250px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .nav-link {
            color: #495057;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 5px 10px;
            transition: all 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            background: rgba(155, 89, 182, 0.1);
            color: var(--sceill-primary);
        }
        .stat-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            font-size: 2.5rem;
            color: var(--sceill-primary);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="p-4">
            <h3 class="mb-4" style="color: var(--sceill-primary);">
                <i class="bi bi-speedometer2 me-2"></i>SCEILL Admin
            </h3>

            <div class="mb-4">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-person-circle" style="font-size: 2.5rem; color: #6c757d;"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">{{ session('user_email', 'Admin') }}</h6>
                        <small class="text-muted">Administrator</small>
                    </div>
                </div>
            </div>

            <nav class="nav flex-column">
                <a class="nav-link active" href="/admin/dashboard">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a class="nav-link" href="/admin/products">
                    <i class="bi bi-box me-2"></i> Products
                </a>
                <a class="nav-link" href="/admin/categories">
                    <i class="bi bi-tags me-2"></i> Categories
                </a>
                <a class="nav-link" href="#">
                    <i class="bi bi-people me-2"></i> Users
                </a>
                <a class="nav-link" href="#">
                    <i class="bi bi-cart me-2"></i> Orders
                </a>
                <a class="nav-link" href="#">
                    <i class="bi bi-bar-chart me-2"></i> Reports
                </a>
                <a class="nav-link" href="#">
                    <i class="bi bi-gear me-2"></i> Settings
                </a>
            </nav>

            <div class="mt-5">
                <form action="/logout" method="POST" class="p-3 border-top">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-2" style="color: var(--sceill-secondary);">Dashboard Overview</h1>
                <p class="text-muted">Welcome back, {{ session('user_email', 'Admin') }}! Here's what's happening with your store today.</p>
            </div>
            <div>
                <a href="/admin/products/create" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i> Add New Product
                </a>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-triangle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted mb-2">Total Products</h6>
                                <h2 class="mb-0">6</h2>
                                <small class="text-success">+2 this month</small>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-box-seam stat-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted mb-2">Total Orders</h6>
                                <h2 class="mb-0">24</h2>
                                <small class="text-success">+5 this week</small>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-cart stat-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted mb-2">Total Revenue</h6>
                                <h2 class="mb-0">Rp 12.5M</h2>
                                <small class="text-success">+15% growth</small>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-currency-exchange stat-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted mb-2">Active Users</h6>
                                <h2 class="mb-0">156</h2>
                                <small class="text-success">+12 today</small>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-people stat-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity & Quick Stats -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="bi bi-clock-history me-2"></i> Recent Orders
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#ORD-001</td>
                                        <td>John Doe</td>
                                        <td>Jan 25, 2024</td>
                                        <td>Rp 850,000</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-002</td>
                                        <td>Jane Smith</td>
                                        <td>Jan 24, 2024</td>
                                        <td>Rp 1,200,000</td>
                                        <td><span class="badge bg-warning">Processing</span></td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-003</td>
                                        <td>Robert Johnson</td>
                                        <td>Jan 23, 2024</td>
                                        <td>Rp 520,000</td>
                                        <td><span class="badge bg-info">Shipped</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-3">
                            <a href="#" class="btn btn-outline-primary">View All Orders</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="bi bi-lightning me-2"></i> Quick Actions
                        </h5>
                        <div class="d-grid gap-3">
                            <a href="/admin/products/create" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i> Add New Product
                            </a>
                            <a href="/admin/products" class="btn btn-outline-primary">
                                <i class="bi bi-box me-2"></i> Manage Products
                            </a>
                            <a href="/admin/categories" class="btn btn-outline-success">
                                <i class="bi bi-tags me-2"></i> Manage Categories
                            </a>
                            <a href="/" class="btn btn-outline-secondary">
                                <i class="bi bi-eye me-2"></i> View Storefront
                            </a>
                        </div>

                        <div class="mt-5">
                            <h6 class="mb-3">System Status</h6>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex justify-content-between px-0">
                                    <span>Store Status:</span>
                                    <span class="badge bg-success">Online</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between px-0">
                                    <span>Products:</span>
                                    <strong>6 items</strong>
                                </div>
                                <div class="list-group-item d-flex justify-content-between px-0">
                                    <span>Categories:</span>
                                    <strong>5 categories</strong>
                                </div>
                                <div class="list-group-item d-flex justify-content-between px-0">
                                    <span>Last Login:</span>
                                    <small>Today, 10:30 AM</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Performance -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="bi bi-graph-up me-2"></i> Top Selling Products
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Units Sold</th>
                                        <th>Revenue</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://images.unsplash.com/photo-1541643600914-78b084683601?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80"
                                                     class="rounded me-3" width="40" height="40">
                                                <div>
                                                    <h6 class="mb-0">Nocturnal Bloom</h6>
                                                    <small class="text-muted">Floral</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Floral</td>
                                        <td>Rp 399,000</td>
                                        <td>45</td>
                                        <td>Rp 17.9M</td>
                                        <td>⭐ 4.8/5</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://images.unsplash.com/photo-1590736969956-6d9c2a8d6975?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80"
                                                     class="rounded me-3" width="40" height="40">
                                                <div>
                                                    <h6 class="mb-0">Ocean Breeze</h6>
                                                    <small class="text-muted">Fresh</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Fresh</td>
                                        <td>Rp 329,000</td>
                                        <td>38</td>
                                        <td>Rp 12.5M</td>
                                        <td>⭐ 4.7/5</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://images.unsplash.com/photo-1541643600914-78b084683601?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80"
                                                     class="rounded me-3" width="40" height="40">
                                                <div>
                                                    <h6 class="mb-0">Mystic Woods</h6>
                                                    <small class="text-muted">Woody</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Woody</td>
                                        <td>Rp 520,000</td>
                                        <td>32</td>
                                        <td>Rp 16.6M</td>
                                        <td>⭐ 4.9/5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-4 pt-4 border-top text-center">
            <small class="text-muted">
                SCEILL Parfum Admin Panel • Version 1.0 •
                <a href="/test" class="text-decoration-none">System Status</a>
            </small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
</body>
</html>
