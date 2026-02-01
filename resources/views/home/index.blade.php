@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 mb-3">Experience Luxury with SCEILL</h1>
            <p class="lead mb-4">Crafted with precision, designed for elegance. Discover your signature scent.</p>
            <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">Explore Collection</a>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3">Featured Products</h2>
            <a href="{{ route('products.index') }}" class="btn btn-outline-dark">View All</a>
        </div>
        
        <div class="row">
            @foreach($featuredProducts as $product)
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    @if($product->has_discount)
                    <span class="badge-discount">-{{ number_format((($product->price - $product->discount_price) / $product->price) * 100, 0) }}%</span>
                    @endif
                    
                    <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-light text-dark mb-2 align-self-start">{{ $product->category->name }}</span>
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($product->description, 60) }}</p>
                        
                        <div class="mt-auto">
                            <div class="mb-2">
                                <span class="price text-dark">
                                    Rp {{ number_format($product->discounted_price, 0, ',', '.') }}
                                </span>
                                @if($product->has_discount)
                                <span class="original-price ms-2">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                                @endif
                            </div>
                            
                            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-outline-dark w-100">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Best Sellers -->
    <section class="container mb-5">
        <h2 class="h3 mb-4">Best Sellers</h2>
        <div class="row">
            @foreach($bestSellers as $product)
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <div class="mb-2">
                            <span class="price text-dark">
                                Rp {{ number_format($product->discounted_price, 0, ',', '.') }}
                            </span>
                        </div>
                        
                        <a href="{{ route('products.show', $product->slug) }}" class="btn btn-dark w-100 mt-auto">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Categories -->
    <section class="container mb-5">
        <h2 class="h3 mb-4">Fragrance Families</h2>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-2 col-6 mb-3">
                <a href="{{ route('products.category', $category->slug) }}" class="text-decoration-none">
                    <div class="card text-center border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-flower1 fs-1 text-primary"></i>
                            </div>
                            <h6 class="card-title">{{ $category->name }}</h6>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
@endsection
