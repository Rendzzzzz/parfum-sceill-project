<!DOCTYPE html>
<html>
<head>
    <title>About - SCEILL Parfum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f8f9fa; }
        .navbar-brand { color: #9b59b6 !important; font-weight: 700; }
        .hero-about { 
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: white; padding: 100px 0; 
        }
    </style>
</head>
<body>
    <!-- Navigation (sama seperti di products page) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">SCEILL Parfum</a>
            <div class="navbar-nav">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/products">Products</a>
                <a class="nav-link active" href="/about">About</a>
                <a class="nav-link" href="/contact">Contact</a>
            </div>
        </div>
    </nav>

    <div class="hero-about">
        <div class="container text-center">
            <h1 class="display-4 mb-3">About SCEILL Parfum</h1>
            <p class="lead">Crafting luxury fragrances since 2024</p>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h3 class="mb-4" style="color: #9b59b6;">Our Story</h3>
                        <p class="lead">
                            SCEILL Parfum was born from a passion for creating extraordinary fragrances 
                            that evoke emotion and create lasting memories.
                        </p>
                        <p>
                            Each scent is carefully crafted using the finest ingredients from around the world, 
                            blended with precision and artistry to create unique olfactory experiences.
                        </p>
                        
                        <h4 class="mt-5 mb-3" style="color: #9b59b6;">Our Philosophy</h4>
                        <ul>
                            <li><strong>Quality First:</strong> We never compromise on ingredient quality</li>
                            <li><strong>Innovation:</strong> Constantly exploring new scent combinations</li>
                            <li><strong>Sustainability:</strong> Ethically sourced and environmentally conscious</li>
                            <li><strong>Customer Experience:</strong> Creating memorable moments through scent</li>
                        </ul>
                        
                        <div class="text-center mt-5">
                            <a href="/products" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-seam me-2"></i> Explore Our Collection
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
