<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Paket Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <a class="nav-link" aria-current="page" href="?page=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="?page=pemesanan">Pesan Sekarang</a>
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
    <!-- form -->
    <div class="container mt-4 mb-5">
    <h5 class="mb-3">Form Pemesanan</h5>
      <form form id="bookingForm" enctype="multipart/form-data" action="?page=booking" method="POST">
        <div class="row">
          <div class="col-md-6">
            <p>Nama Pemesanan</p>
            <div class="mb-3">
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
          </div>
          <div class="col-md-6">
            <p>No Telp.</p>
            <div class="mb-3">
              <input type="number" class="form-control" id="notelp" name="notelp">
            </div>
          </div>
          <div class="col-md-6">
            <p>Tanggal Pemesanan</p>
            <div class="mb-3">
              <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Pesan">
            </div>
          </div>
          <div class="col-md-6">
            <p>Durasi (Hari)</p>
            <div class="mb-3">
              <input type="number" class="form-control" id="durasi" name="durasi" value="1">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="row">
            <div class="col mt-4">
              <h6>Pilih Paket Wisata</h6>
              <div class="mb-3">
                <div class="form-check">
                  <input type="radio" id="premium" name="jenis_paket" class="form-check-input" value="1000000" checked>
                  <label class="form-check-label" for="premium">
                    <span class="d-block d-md-none">1</span>
                    <span class="d-none d-md-block">Paket Premium (Rp. 1.000.000)</span>
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input type="radio" id="eksekutif" name="jenis_paket" class="form-check-input" value="1500000">
                  <label class="form-check-label" for="eksekutif">
                    <span class="d-block d-md-none">2</span>
                    <span class="d-none d-md-block">Paket Eksekutif (Rp. 1.500.000)</span>
                  </label>
                </div>
              </div>
            </div>

            <div class="col mt-4">
              <h6>Pilih Fasilitas</h6>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="200000" id="travel" name="travel">
                  <label class="form-check-label" for="travel">
                    Include Travel (Rp. 200.000)
                  </label>
                </div>
              </div>

              <div class="col-md-6 mt-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="150000" id="dinner" name="dinner">
                  <label class="form-check-label" for="dinner">
                    Include Dinner (Rp. 150.000)
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mt-4">
            <p>Harga Paket</p>
            <div class="mb-3">
              <input type="text" disabled class="form-control" id="hargapaket" name="harga_paket">
            </div>
          </div>

          <div class="col-md-6 mt-4">
            <p>Jumlah Tagihan</p>
            <div class="mb-3">
              <input type="text" disabled class="form-control" id="jumlahtagihan" name="jumlah_tagihan">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#resumeModal">Submit</button>
        </div>
      </form>
    </div>
    <!-- Resume Modal -->
    <div class="modal fade" id="resumeModal" tabindex="-1" aria-labelledby="resumeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="resumeModalLabel">Resume Pemesanan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p><strong>Nama Pemesan:</strong> <span id="resumeNama"></span></p>
            <p><strong>No Telp:</strong> <span id="resumeNotelp"></span></p>
            <p><strong>Tanggal Pemesanan:</strong> <span id="resumeTanggal"></span></p>
            <p><strong>Durasi:</strong> <span id="resumeDurasi"></span> hari</p>
            <p><strong>Paket Wisata:</strong> <span id="resumePaket"></span></p>
            <p><strong>Fasilitas:</strong> <span id="resumeFasilitas"></span></p>
            <p><strong>Harga Paket:</strong> <span id="resumeHargaPaket"></span></p>
            <p><strong>Jumlah Tagihan:</strong> <span id="resumeJumlahTagihan"></span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="finalSubmit">Confirm</button>
          </div>
        </div>
      </div>
    </div>
    <!-- fungsi form pemesanan -->
    <script>
			$(document).ready(function() {
				function calculateTotal() {
					var pricePackage = parseInt($("input[name='jenis_paket']:checked").val());
					var travel = $("#travel").is(":checked") ? parseInt($("#travel").val()) : 0;
					var dinner = $("#dinner").is(":checked") ? parseInt($("#dinner").val()) : 0;
					var duration = parseInt($("#durasi").val());

					var totalPackagePrice = pricePackage + travel + dinner;
					var totalBill = (pricePackage + travel + dinner) * duration;

					$("#hargapaket").val("Rp. " + totalPackagePrice.toLocaleString('id-ID'));
					$("#jumlahtagihan").val("Rp. " + totalBill.toLocaleString('id-ID'));
				}

				$("input[name='jenis_paket'], #travel, #dinner, #durasi").on("change", calculateTotal);
				calculateTotal(); // Initial calculation

        // menampilkan resume pemesanan
        $("button[data-bs-target='#resumeModal']").on("click", function() {
          $("#resumeNama").text($("#nama").val());
          $("#resumeNotelp").text($("#notelp").val());
          $("#resumeTanggal").text($("#tanggal").val());
          $("#resumeDurasi").text($("#durasi").val());

          var paketText = $("input[name='jenis_paket']:checked").next("label").text();
          $("#resumePaket").text(paketText);

          var fasilitasText = [];
          if($("#travel").is(":checked")) fasilitasText.push("Include Travel (Rp. 200.000)");
          if($("#dinner").is(":checked")) fasilitasText.push("Include Dinner (Rp. 150.000)");
          $("#resumeFasilitas").text(fasilitasText.join(", "));

          $("#resumeHargaPaket").text($("#hargapaket").val());
          $("#resumeJumlahTagihan").text($("#jumlahtagihan").val());
        });

        // final submit
        $("#finalSubmit").on("click", function() {
          $("#bookingForm").submit();
        });
			});
		</script>
</body>
			
    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
      <p>&copy; 2024 Desa Wisata Pulau Pahawang. All Rights Reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
