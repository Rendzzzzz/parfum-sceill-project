@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.category', $product->category->slug) }}">{{ $product->category->name }}</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Product Images -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="text-center">
                        <img src="{{ asset('images/products/' . ($product->image ?? 'default.jpg')) }}"
                             alt="{{ $product->name }}"
                             class="img-fluid rounded"
                             style="max-height: 500px; object-fit: contain;"
                             onerror="this.src='https://via.placeholder.com/500x500?text=SCEILL+Parfum'">
                    </div>

                    <!-- Thumbnails (optional) -->
                    <div class="row mt-4">
                        <div class="col-3">
                            <a href="#" class="d-block border rounded p-2">
                                <img src="{{ asset('images/products/' . ($product->image ?? 'default.jpg')) }}"
                                     alt="Thumbnail 1" class="img-fluid">
                            </a>
                        </div>
                        <!-- Add more thumbnails if needed -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <!-- Badges -->
                    <div class="mb-3">
                        @if($product->is_best_seller)
                        <span class="badge bg-warning me-2">
                            <i class="bi bi-star"></i> Best Seller
                        </span>
                        @endif
                        @if($product->is_featured)
                        <span class="badge bg-info me-2">
                            <i class="bi bi-star-fill"></i> Featured
                        </span>
                        @endif
                        @if($product->discount_price)
                        <span class="badge bg-danger">
                            <i class="bi bi-tag"></i> Sale
                        </span>
                        @endif
                    </div>

                    <!-- Product Name -->
                    <h1 class="h2 fw-bold mb-3">{{ $product->name }}</h1>

                    <!-- Category -->
                    <div class="mb-4">
                        <span class="badge bg-light text-dark fs-6">
                            <i class="bi bi-tag"></i> {{ $product->category->name }}
                        </span>
                    </div>

                    <!-- Price -->
                    <div class="mb-4">
                        @if($product->discount_price)
                        <div class="d-flex align-items-center">
                            <h2 class="text-dark fw-bold me-3">
                                Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                            </h2>
                            <h4 class="text-muted text-decoration-line-through">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </h4>
                            <span class="badge bg-danger ms-3">
                                Save Rp {{ number_format($product->price - $product->discount_price, 0, ',', '.') }}
                            </span>
                        </div>
                        @else
                        <h2 class="text-dark fw-bold">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </h2>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <h5 class="mb-3" style="color: #9b59b6;">Deskripsi</h5>
                        <p class="lead">{{ $product->description }}</p>
                    </div>

                    <!-- Fragrance Notes -->
                    <div class="mb-5">
                        <h5 class="mb-4" style="color: #9b59b6;">Fragrance Notes</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card border-0 bg-light h-100">
                                    <div class="card-body text-center">
                                        <h6 class="text-primary mb-3">
                                            <i class="bi bi-flower1"></i> Top Notes
                                        </h6>
                                        <p class="mb-0">{{ $product->top_notes }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card border-0 bg-light h-100">
                                    <div class="card-body text-center">
                                        <h6 class="text-success mb-3">
                                            <i class="bi bi-tree"></i> Middle Notes
                                        </h6>
                                        <p class="mb-0">{{ $product->middle_notes }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card border-0 bg-light h-100">
                                    <div class="card-body text-center">
                                        <h6 class="text-warning mb-3">
                                            <i class="bi bi-moon"></i> Base Notes
                                        </h6>
                                        <p class="mb-0">{{ $product->base_notes }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <h6 class="text-muted mb-2">Size</h6>
                                <p class="mb-0 fw-bold">{{ $product->size ?? '100ml' }}</p>
                            </div>
                            <div class="col-6 mb-3">
                                <h6 class="text-muted mb-2">Fragrance Family</h6>
                                <p class="mb-0 fw-bold">{{ $product->fragrance_family }}</p>
                            </div>
                            <div class="col-6">
                                <h6 class="text-muted mb-2">Stok Tersedia</h6>
                                @if($product->stock > 10)
                                <p class="mb-0 fw-bold text-success">
                                    <i class="bi bi-check-circle"></i> {{ $product->stock }} pcs
                                </p>
                                @elseif($product->stock > 0)
                                <p class="mb-0 fw-bold text-warning">
                                    <i class="bi bi-exclamation-triangle"></i> {{ $product->stock }} pcs (Limited)
                                </p>
                                @else
                                <p class="mb-0 fw-bold text-danger">
                                    <i class="bi bi-x-circle"></i> Out of Stock
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Add to Cart -->
                    @if($product->stock > 0)
                    <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-4">
                        @csrf
                        <div class="row align-items-center">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="input-group" style="max-width: 150px;">
                                    <button class="btn btn-outline-dark" type="button" onclick="decreaseQuantity()">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" name="quantity" id="quantity"
                                           value="1" min="1" max="{{ $product->stock }}"
                                           class="form-control text-center border-dark">
                                    <button class="btn btn-outline-dark" type="button" onclick="increaseQuantity()">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-sceill btn-lg w-100">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Produk ini sedang tidak tersedia. Silakan cek kembali nanti.
                    </div>
                    @endif

                    <!-- Additional Info -->
                    <div class="mt-4 pt-4 border-top">
                        <div class="row">
                            <div class="col-6 text-center">
                                <i class="bi bi-truck display-6 d-block mb-2" style="color: #9b59b6;"></i>
                                <small class="text-muted">Free Shipping<br>Over Rp 500.000</small>
                            </div>
                            <div class="col-6 text-center">
                                <i class="bi bi-arrow-counterclockwise display-6 d-block mb-2" style="color: #9b59b6;"></i>
                                <small class="text-muted">14-Day<br>Returns</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <div class="row mt-5 pt-5 border-top">
        <div class="col-12">
            <h3 class="mb-4" style="color: #9b59b6;">
                <i class="bi bi-box-seam me-2"></i> You May Also Like
            </h3>
            <div class="row">
                @foreach($relatedProducts as $related)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card product-card h-100">
                        <a href="{{ route('products.show', $related->slug) }}">
                            <img src="{{ asset('images/products/' . ($related->image ?? 'default.jpg')) }}"
                                 class="card-img-top"
                                 alt="{{ $related->name }}"
                                 style="height: 200px; object-fit: cover;"
                                 onerror="this.src='https://via.placeholder.com/300x200?text=SCEILL'">
                        </a>

                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="{{ route('products.show', $related->slug) }}" class="text-decoration-none text-dark">
                                    {{ Str::limit($related->name, 40) }}
                                </a>
                            </h6>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price text-dark fw-bold">
                                    Rp {{ number_format($related->discount_price ?? $related->price, 0, ',', '.') }}
                                </span>
                                <a href="{{ route('products.show', $related->slug) }}" class="btn btn-sm btn-outline-dark">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>

<script>
    function increaseQuantity() {
        const input = document.getElementById('quantity');
        const max = parseInt(input.max);
        if (parseInt(input.value) < max) {
            input.value = parseInt(input.value) + 1;
        }
    }

    function decreaseQuantity() {
        const input = document.getElementById('quantity');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>
@endsection
