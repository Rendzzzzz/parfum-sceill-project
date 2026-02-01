@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="h3 mb-0" style="color: #000080;">
                                <i class="bi bi-speedometer2 me-2"></i>Dashboard Admin
                            </h1>
                            <p class="text-muted mb-0">Selamat datang, {{ auth()->user()->name }}!</p>
                        </div>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-sceill">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                                Total Produk</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $stats['total_products'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-box-seam fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-success text-uppercase mb-1">
                                Total Kategori</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $stats['total_categories'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-tags fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-info text-uppercase mb-1">
                                Total Pengguna</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $stats['total_users'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-people fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                                Stok Rendah</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $stats['low_stock'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-exclamation-triangle fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Products & Low Stock -->
    <div class="row">
        <!-- Recent Products -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 fw-bold" style="color: #000080;">
                        <i class="bi bi-clock-history me-1"></i> Produk Terbaru
                    </h6>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-primary">
                        Lihat Semua
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_products as $product)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($product->image)
                                            <img src="{{ asset('images/products/' . $product->image) }}"
                                                 alt="{{ $product->name }}"
                                                 class="rounded me-3"
                                                 width="40" height="40"
                                                 style="object-fit: cover;">
                                            @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center me-3"
                                                 style="width: 40px; height: 40px;">
                                                <i class="bi bi-image text-muted"></i>
                                            </div>
                                            @endif
                                            <div>
                                                <h6 class="mb-0">{{ $product->name }}</h6>
                                                <small class="text-muted">{{ Str::limit($product->description, 30) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>
                                        @if($product->stock > 10)
                                            <span class="badge bg-success">{{ $product->stock }}</span>
                                        @elseif($product->stock > 0)
                                            <span class="badge bg-warning">{{ $product->stock }}</span>
                                        @else
                                            <span class="badge bg-danger">Habis</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->is_featured)
                                            <span class="badge bg-info me-1">Featured</span>
                                        @endif
                                        @if($product->is_best_seller)
                                            <span class="badge bg-warning">Best Seller</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Low Stock Products -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-danger">
                        <i class="bi bi-exclamation-triangle me-1"></i> Stok Hampir Habis
                    </h6>
                </div>
                <div class="card-body">
                    @if($low_stock_products->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($low_stock_products as $product)
                        <div class="list-group-item d-flex justify-content-between align-items-center px-0 border-0">
                            <div>
                                <h6 class="mb-1">{{ $product->name }}</h6>
                                <small class="text-muted">{{ $product->category->name }}</small>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-danger">{{ $product->stock }} stok</span>
                                <br>
                                <small class="text-muted">Rp {{ number_format($product->price, 0, ',', '.') }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="bi bi-check-circle display-4 text-success mb-3"></i>
                        <h5 class="text-success">Semua stok aman!</h5>
                        <p class="text-muted">Tidak ada produk dengan stok rendah.</p>
                    </div>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin.products.index') }}?stock=low" class="btn btn-sm btn-outline-danger">
                        Kelola Stok
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4" style="color: #000080;">
                        <i class="bi bi-lightning me-2"></i>Quick Actions
                    </h5>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <a href="{{ route('admin.products.create') }}" class="card text-center border-0 shadow-sm h-100 text-decoration-none">
                                <div class="card-body py-4">
                                    <i class="bi bi-plus-circle display-4 mb-3" style="color: #000080;"></i>
                                    <h6 class="card-title">Tambah Produk</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.products.index') }}" class="card text-center border-0 shadow-sm h-100 text-decoration-none">
                                <div class="card-body py-4">
                                    <i class="bi bi-box-seam display-4 mb-3" style="color: #000080;"></i>
                                    <h6 class="card-title">Kelola Produk</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="#" class="card text-center border-0 shadow-sm h-100 text-decoration-none">
                                <div class="card-body py-4">
                                    <i class="bi bi-tags display-4 mb-3" style="color: #000080;"></i>
                                    <h6 class="card-title">Kelola Kategori</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="#" class="card text-center border-0 shadow-sm h-100 text-decoration-none">
                                <div class="card-body py-4">
                                    <i class="bi bi-people display-4 mb-3" style="color: #000080;"></i>
                                    <h6 class="card-title">Kelola Pengguna</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border-radius: 12px;
        border: none;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-3px);
    }

    .border-left-primary {
        border-left: 4px solid #000080 !important;
    }

    .border-left-success {
        border-left: 4px solid #2ecc71 !important;
    }

    .border-left-info {
        border-left: 4px solid #3498db !important;
    }

    .border-left-warning {
        border-left: 4px solid #f39c12 !important;
    }

    .list-group-item {
        border-bottom: 1px solid #eee !important;
    }

    .list-group-item:last-child {
        border-bottom: none !important;
    }
</style>
@endpush
