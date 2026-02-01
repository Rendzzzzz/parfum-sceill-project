<!DOCTYPE html>
<html>
<head>
    <title>Manage Categories - SCEILL Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root { --sceill-primary: #9b59b6; }
        body { font-family: 'Segoe UI', sans-serif; background: #f8f9fa; }
        .sidebar { background: white; min-height: 100vh; width: 250px; position: fixed; }
        .main-content { margin-left: 250px; padding: 20px; }
        .nav-link { color: #495057; padding: 12px 20px; margin: 5px 10px; border-radius: 8px; }
        .nav-link.active { background: rgba(155, 89, 182, 0.1); color: var(--sceill-primary); }
        .category-card { border: none; border-radius: 12px; transition: transform 0.3s; }
        .category-card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="p-4">
            <h3 class="mb-4" style="color: var(--sceill-primary);">SCEILL Admin</h3>
            <nav class="nav flex-column">
                <a class="nav-link" href="/admin/dashboard"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                <a class="nav-link" href="/admin/products"><i class="bi bi-box me-2"></i> Products</a>
                <a class="nav-link active" href="/admin/categories"><i class="bi bi-tags me-2"></i> Categories</a>
                <form action="/logout" method="POST" class="mt-5 p-3 border-top">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100">Logout</button>
                </form>
            </nav>
        </div>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-2"><i class="bi bi-tags me-2"></i> Category Management</h1>
                <p class="text-muted">Organize your fragrance categories</p>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="bi bi-plus-circle me-2"></i> Add Category
            </button>
        </div>

        <!-- Categories Grid -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card category-card shadow-sm">
                    <div class="card-body text-center">
                        <i class="bi bi-flower1 display-4 mb-3" style="color: var(--sceill-primary);"></i>
                        <h5>Floral</h5>
                        <p class="text-muted small">5 products</p>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-outline-primary">Edit</button>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more category cards -->
        </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" placeholder="e.g., Floral, Woody, Fresh">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save Category</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
