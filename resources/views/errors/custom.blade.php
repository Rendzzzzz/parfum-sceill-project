<!DOCTYPE html>
<html>
<head>
    <title>Error - SCEILL Parfum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center p-5">
                        <div class="mb-4">
                            <i class="bi bi-exclamation-triangle display-1 text-danger"></i>
                        </div>
                        <h1 class="h3 mb-3">Oops! Something went wrong</h1>
                        <div class="alert alert-danger mb-4">
                            <p class="mb-0">{{ $message ?? 'An unexpected error occurred.' }}</p>
                            @isset($code)
                            <small class="text-muted">Error Code: {{ $code }}</small>
                            @endisset
                        </div>
                        <div class="d-grid gap-2">
                            <a href="/" class="btn btn-primary">
                                <i class="bi bi-house"></i> Back to Home
                            </a>
                            <a href="/products" class="btn btn-outline-secondary">
                                <i class="bi bi-box-seam"></i> View Products
                            </a>
                        </div>
                    </div>
                </div>

                @if(app()->environment('local'))
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Debug Information</h5>
                        <pre class="bg-dark text-light p-3 rounded small">@php print_r(get_defined_vars()) @endphp</pre>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
