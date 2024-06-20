<?php
// ambil data video
$jsonFilePath = __DIR__ . '/../AssetVideo.json';
$jsonContent = file_exists($jsonFilePath) ? file_get_contents($jsonFilePath) : false;
// validasi data video
if ($jsonContent === false) {
    $videos = [];
    // File json tidak terbaca
    echo "<p>Error: Unable to read JSON file.</p>";
} else {
    $videos = json_decode($jsonContent, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        $videos = [];
        // terjadi error pada format json
        echo "<p>Error: Invalid JSON format.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Pariwisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .carousel-item img {
        object-fit: fill;
        width: 100%;
        height: 100%;
        max-height: 450px;
      }
      .carousel-inner {
        height: 450px;
      }
      .border-rounded-shadow {
        border: 2px solid #6c757d;
        border-radius: 25px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 20px;
        margin: 20px;
      }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Desa Wisata Pulau Pahawang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=pemesanan">Pesan Sekarang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=admin">Riwayat Pemesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel Section -->
    <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="./images/3.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="./images/4.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            
          </div>
        </div>
        <div class="carousel-item">
          <img src="./images/6.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- About Section -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">Tentang Kami</h3>
                <p align = "justify" class = "lead text-dark">Kami adalah agen pariwisata yang berlokasi di Desa Wisata Pulau Pahawang, tepat di tepi pulau yang memukau dengan keindahan alamnya. Dengan beragam destinasi menarik dan layanan berkualitas, kami siap membuat liburan Anda tak terlupakan di Pulau Pahawang. Pengalaman terbaik kami akan membawa Anda merasakan sensasi yang tidak terlupakan.</p>
            </div>
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" style="max-height: 350px;">
                        <div class="carousel-item active">
                            <img src="./images/2.jpg" class="d-block w-100" alt="Tentang Kami" width="600" height="350">
                        </div>
                        <div class="carousel-item">
                            <img src="./images/9.png" class="d-block w-100" alt="Tentang Kami" width="600" height="350">
                        </div>
                        <div class="carousel-item">
                            <img src="./images/7.webp" class="d-block w-100" alt="Tentang Kami" width="600" height="350">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Destinations Section -->
    <div id ="destinations" class="container mt-4">
    <div class="row">
      <div class="col-md-8">
        <h4 class="text-center"> List Paket Wisata</h4>
        <br></br>
      </div>
      <div class="col-md-4">
        <h4>Preview</h4>
        <br></br>
      </div>
    </div>
      <div class="row">
        <div class="col-md-8 col-md-4" >
          <div class="container">
            <div class="row">
                <div class="col-md-4">
                  <div class="card h-100">
                    <img src="./images/9.png" class="card-img-top" alt="..." style="height: 180px; width: 100%; object-fit: cover;">
                    <div class="card-body">
                      <p class="card-title"><strong>Paket Premium Wisata Pulau Pahawang Promo Mulai dari 1 juta</strong></p>
                      <h5 class="text-primary">Rp.1.000.000</h5>
                      <br></br>
                      <a href="?page=pemesanan" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card h-100">
                  <img src="./images/10.png" class="card-img-top" alt="..." style="height: 180px; width: 100%; object-fit: cover;">
                    <div class="card-body">
                      <p class="card-title"><strong>Paket Eksekutif Wisata Pulau Pahawang Promo Mulai dari 1,5 juta</strong></p>
                      <h5 class="text-primary">Rp.1.500.000</h5>
                      <br></br>
                      <a href="?page=pemesanan" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card h-100">
                    <img src="./images/7.webp" class="card-img-top" alt="..." style="height: 180px; width: 100%; object-fit: cover;">
                    <div class="card-body">
                      <p class="card-title"><strong>Check-In Hotel Anda dengan harga Promo Mulai dari 500 ribu</strong></p>
                      <h5 class="text-primary">Rp.500.000</h5>
                      <br></br>
                      <a href="?page=pemesanan" class="btn btn-primary">pesan Sekarang</a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- menampilkan video menggunakan looping foreach -->
        <div class="col-md-4">
          <?php foreach ($videos as $video) : ?>
              <div class="ratio ratio-16x9 mb-3">
                  <iframe src="<?= $video['url'] ?>" title="<?= $video['title'] ?>"></iframe>
              </div>
              <br>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5">
        <div class="container">
            <h4 class="text-center">Testimoni</h4>
            <br></br>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="card-text">"Pengalaman yang luar biasa! Layanan sangat memuaskan."</p>
                            <footer class="blockquote-footer">Sholeh</footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="card-text">"Destinasi yang indah dan pelayanan yang ramah."</p>
                            <footer class="blockquote-footer">Redho</footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="card-text">"Sangat direkomendasikan untuk liburan keluarga."</p>
                            <footer class="blockquote-footer">Boy</footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2024 Desa Wisata Pulau Pahawang. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>

