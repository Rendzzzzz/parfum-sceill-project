@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
            <li class="breadcrumb-item active">{{ $category->name }}</li>
        </ol>
    </nav>

    <!-- Category Header -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-5 fw-bold mb-3" style="color: #9b59b6;">
                <i class="bi bi-flower1"></i> {{ $category->name }}
            </h1>
            <p class="lead text-muted">{{ $category->description }}</p>
            <p class="text-muted">{{ $products->total() }} produk tersedia</p>
        </div>
    </div>

    <!-- Products Grid -->
    @if($products->count() > 0)
    <div class="row">
        @foreach($products as $product)
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
            <div class="card product-card h-100">
                @if($product->discount_price)
                <span class="badge-discount">
                    -{{ number_format((($product->price - $product->discount_price) / $product->price) * 100, 0) }}%
                </span>
                @endif

                <a href="{{ route('products.show', $product->slug) }}">
                    <img src="{{ asset('images/products/' . ($product->image ?? 'default.jpg')) }}"
                         class="card-img-top"
                         alt="{{ $product->name }}"
                         style="height: 200px; object-fit: cover;">
                </a>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-dark">
                            {{ Str::limit($product->name, 40) }}
                        </a>
                    </h5>

                    <p class="card-text text-muted small flex-grow-1">
                        {{ Str::limit($product->description, 60) }}
                    </p>

                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="price text-dark fw-bold">
                                Rp {{ number_format($product->discount_price ?? $product->price, 0, ',', '.') }}
                            </span>

                            @if($product->stock > 0)
                            <span class="badge bg-success">Ready</span>
                            @else
                            <span class="badge bg-danger">Sold Out</span>
                            @endif
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-outline-dark btn-sm">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        {{ $products->links() }}
    </div>
    @else
    <!-- No Products -->
    <div class="text-center py-5">
        <i class="bi bi-flower1 display-1 text-muted mb-4"></i>
        <h3 class="text-muted">Belum ada produk di kategori ini</h3>
        <p class="text-muted">Produk akan segera tersedia.</p>
        <a href="{{ route('products.index') }}" class="btn btn-sceill">
            <i class="bi bi-arrow-left"></i> Kembali ke Produk
        </a>
    </div>
    @endif
</div>
@endsection
