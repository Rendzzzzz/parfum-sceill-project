<!DOCTYPE html>
<html>
<head>
    <title>Manage Products - SCEILL Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root { --sceill-primary: #9b59b6; --sceill-secondary: #2c3e50; }
        body { font-family: 'Segoe UI', sans-serif; background: #f8f9fa; }
        .sidebar { background: white; min-height: 100vh; width: 250px; position: fixed; box-shadow: 2px 0 10px rgba(0,0,0,0.05); }
        .main-content { margin-left: 250px; padding: 20px; }
        .nav-link { color: #495057; padding: 12px 20px; margin: 5px 10px; border-radius: 8px; }
        .nav-link:hover, .nav-link.active { background: rgba(155, 89, 182, 0.1); color: var(--sceill-primary); }
        .product-img { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; }
    </style>
</head>
<body>
    <!-- Sidebar (sama seperti dashboard) -->
    <div class="sidebar">
        <div class="p-4">
            <h3 class="mb-4" style="color: var(--sceill-primary);">
                <i class="bi bi-speedometer2 me-2"></i>SCEILL Admin
            </h3>
            <nav class="nav flex-column">
                <a class="nav-link" href="/admin/dashboard"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                <a class="nav-link active" href="/admin/products"><i class="bi bi-box me-2"></i> Products</a>
                <a class="nav-link" href="/admin/categories"><i class="bi bi-tags me-2"></i> Categories</a>
                <a class="nav-link" href="#"><i class="bi bi-cart me-2"></i> Orders</a>
                <form action="/logout" method="POST" class="mt-5 p-3 border-top">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-2" style="color: var(--sceill-secondary);">
                    <i class="bi bi-box me-2"></i> Product Management
                </h1>
                <p class="text-muted">Manage your fragrance collection</p>
            </div>
            <div>
                <a href="/admin/products/create" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i> Add New Product
                </a>
                <a href="/admin/dashboard" class="btn btn-outline-secondary ms-2">
                    <i class="bi bi-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Search products...">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option>All Categories</option>
                            <option>Floral</option>
                            <option>Woody</option>
                            <option>Fresh</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option>All Status</option>
                            <option>In Stock</option>
                            <option>Out of Stock</option>
                            <option>Featured</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-funnel"></i> Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://images.unsplash.com/photo-1541643600914-78b084683601?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                             class="product-img me-3">
                                        <div>
                                            <h6 class="mb-0">SCEILL Nocturnal Bloom</h6>
                                            <small class="text-muted">Floral fragrance</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark">Floral</span></td>
                                <td>
                                    <strong>Rp 399,000</strong><br>
                                    <small class="text-muted text-decoration-line-through">Rp 450,000</small>
                                </td>
                                <td><span class="badge bg-success">50 in stock</span></td>
                                <td>
                                    <span class="badge bg-warning me-1">Best Seller</span>
                                    <span class="badge bg-info">Featured</span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-success">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Add more product rows as needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
