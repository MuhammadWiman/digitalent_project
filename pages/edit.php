<?php
require_once './database/koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_pemesan WHERE id = $id";
    $result = $koneksi->query($sql);
    $row = $result->fetch_assoc();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $notelp = $_POST['notelp'];
    $tanggal = $_POST['tanggal'];
    $durasi = $_POST['durasi'];
    $jenis_paket = $_POST['jenis_paket'];
    $travel = isset($_POST['travel']) ? 1 : 0;
    $dinner = isset($_POST['dinner']) ? 1 : 0;

    $totalPackagePrice = $jenis_paket + ($travel ? 200000 : 0) + ($dinner ? 150000 : 0);
    $totalBill = $totalPackagePrice * $durasi;

    $sql = "UPDATE tbl_pemesan SET 
            nama='$nama', no_telp='$notelp', tanggal='$tanggal', durasi='$durasi', 
            jenis_paket='$jenis_paket', travel='$travel', dinner='$dinner', 
            harga_paket='$totalPackagePrice', total_bill='$totalBill' 
            WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: /admin");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
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
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Pemesanan</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
            </div>
            <div class="mb-3">
                <label for="notelp" class="form-label">No Telp</label>
                <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $row['no_telp']; ?>">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>">
            </div>
            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi</label>
                <input type="number" class="form-control" id="durasi" name="durasi" value="<?php echo $row['durasi']; ?>">
            </div>
            <div class="mb-3">
                <label for="jenis_paket" class="form-label">Jenis Paket</label>
                <input type="text" class="form-control" id="jenis_paket" name="jenis_paket" value="<?php echo $row['jenis_paket']; ?>">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="travel" name="travel" <?php echo $row['travel'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="travel">Include Travel (Rp. 200.000)</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="dinner" name="dinner" <?php echo $row['dinner'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="dinner">Include Dinner (Rp. 150.000)</label>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="?pages=admin" class="btn btn-secondary">Back to Home</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
