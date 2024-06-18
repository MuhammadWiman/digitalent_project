<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found - Pariwisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('./images/8.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.7);
            opacity: 0.4;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .content {
            position: relative;
            z-index: 10;
        }
        .btn-custom {
            background-color: #ff6347;
            color: white;
        }
        .btn-custom:hover {
            background-color: #e5533d;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container text-center text-white content">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-8">
                <h1 class="display-1">404</h1>
                <h2 class="mb-4">Halaman Tidak Ditemukan</h2>
                <p class="lead"><strong>Maaf, halaman yang Anda cari tidak ada. Anda ingin kembali ke halaman utama?</strong></p>
                <a href="/parawisata/" class="btn btn-custom btn-lg mt-3">Kembali ke Halaman Utama</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
