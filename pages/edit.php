 <?php
// Menghubungkan dengan database
 require_once './database/koneksi.php';
 
// Mendapatkan data pemesanan berdasarkan id
 if(isset($_GET['id'])) {
     $id = $_GET['id'];
     $sql = "SELECT * FROM tbl_pemesan WHERE id = $id";
     $result = $koneksi->query($sql);
     $row = $result->fetch_assoc();
 }
 
// Memproses update data pemesanan
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $id = $_POST['id'];
     $nama = $_POST['nama'];
     $noTelp = $_POST['notelp'];
     $tanggal = $_POST['tanggal'];
     $durasi = $_POST['durasi'];
     $hargaPaket = $_POST['jenis_paket'];
     $travel = isset($_POST['travel']) ? 1 : 0;
     $dinner = isset($_POST['dinner']) ? 1 : 0;
    
    if ($hargaPaket == "1000000") {
        $jenisPaket = "Paket Premium";
    }
    else {
        $jenisPaket = "Paket Eksekutif";
    }
    $totalPackagePrice = $hargaPaket + ($travel ? 200000 : 0) + ($dinner ? 150000 : 0);
    $totalBill = $totalPackagePrice * $durasi;

    $sql = "UPDATE tbl_pemesan SET 
            nama='$nama', no_telp='$noTelp', tanggal='$tanggal', durasi='$durasi', 
            jenis_paket='$jenisPaket', travel='$travel', dinner='$dinner', 
            harga_paket='$totalPackagePrice', total_bill='$totalBill' 
            WHERE id=$id";
    if ($koneksi->query($sql) === TRUE) {
        $_SESSION['alert_message'] = 'Update Data berhasil';
        echo '<script>
                alert("Update Data berhasil");
                window.location.href = "?page=admin";
              </script>';
        exit;
    } else {
        echo '<script>
                alert("Update Gagal !!!");
                window.location.href = "?edit='.$id.'";
              </script>';
        exit;
    }
 }
 $koneksi->close();
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edit Pemesanan</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 </head>
 <body>
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
                        <a class="nav-link" href="?page=pemesanan">Pesan Sekarang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=admin">Riwayat Pemesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4 mb-5">
    <h5 class="mb-3">Edit Data Pemesanan</h5>
      <form form id="bookingForm" method="POST">
        <div class="row">
          <div class="col-md-6">
            <p>Id pemesan</p>
            <div class="mb-3">
              <input type="number" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>">
            </div>
          </div>
          <div class="col-md-6">
            <p>Nama Pemesanan</p>
            <div class="mb-3">
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
            </div>
          </div>
          <div class="col-md-6">
            <p>No Telp.</p>
            <div class="mb-3">
              <input type="number" class="form-control" id="notelp" name="notelp" value="<?php echo $row['no_telp']; ?>">
            </div>
          </div>
          <div class="col-md-6">
            <p>Tanggal Pemesanan</p>
            <div class="mb-3">
              <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Pesan" value="<?php echo $row['tanggal']; ?>">
            </div>
          </div>
          <div class="col-md-6">
            <p>Durasi (Hari)</p>
            <div class="mb-3">
              <input type="number" class="form-control" id="durasi" name="durasi" value="<?php echo $row['durasi']; ?>">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="row">
            <div class="col mt-4">
              <h6>Pilih Paket Wisata</h6>
              <div class="mb-3">
                <div class="form-check">
                <input type="radio" class="form-check-input" id="jenis_paket" name="jenis_paket" value="1000000" <?php echo $row['jenis_paket']=="Paket Premium" ? 'checked' : ''; ?>>
                  <label class="form-check-label" for="premium">
                    <span class="d-block d-md-none">1</span>
                    <span class="d-none d-md-block">Paket Premium (Rp. 1.000.000)</span>
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                <input type="radio" class="form-check-input" id="jenis_paket" name="jenis_paket" value="1500000" <?php echo $row['jenis_paket']=="Paket Eksekutif" ? 'checked' : ''; ?>>
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
                <input class="form-check-input" type="checkbox" id="travel" name="travel" value="200000" <?php echo $row['travel'] ? 'checked' : ''; ?>>
                  <label class="form-check-label" for="travel">
                    Include Travel (Rp. 200.000)
                  </label>
                </div>
              </div>

              <div class="col-md-6 mt-4">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="dinner" name="dinner" value="150000" <?php echo $row['dinner'] ? 'checked' : ''; ?>>
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
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>
