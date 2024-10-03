<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 text-center">
                <h1 class="display-1 fw-bold text-primary">404</h1>
                <h2 class="mb-3">Page Not Found</h2>
                <p class="lead mb-4">Waduh! Sepertinya halaman yang ingin Anda akses tidak ada atau sudah dialihkan!</p>
                <a href="{{ route(name: 'main') }}" class="btn btn-primary btn-lg">Kembali ke Halaman Utama</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
