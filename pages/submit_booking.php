<?php
    require_once './database/koneksi.php';

    // Mendapatkan data dari form pemesanan
    $nama = $_POST['nama'];
    $notelp = $_POST['notelp'];
    $tanggal = $_POST['tanggal'];
    $durasi = $_POST['durasi'];
    $jenis_paket = $_POST['jenis_paket'];
    $travel = isset($_POST['travel']) ? $_POST['travel'] : 0;
    $dinner = isset($_POST['dinner']) ? $_POST['dinner'] : 0;

    // Kalkulasi total harga paket dan total biaya
    $totalPackagePrice = $jenis_paket + $travel + $dinner;
    $totalBill = $totalPackagePrice * $durasi;

    // Validasi menambahkan fasilitas
    $travel = !empty($travel) ? 1 : 0;
    $dinner = !empty($dinner) ? 1 : 0;

    // Memasukkan data ke database
    $sql = "INSERT INTO tbl_pemesan (nama, no_telp, tanggal, durasi, jenis_paket, travel, dinner, harga_paket, total_bill) 
            VALUES ('$nama', '$notelp', '$tanggal', '$durasi', '$jenis_paket', '$travel', '$dinner', '$totalPackagePrice', '$totalBill')";

    $bookingSuccess = $koneksi->query($sql) === TRUE;
    $koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .confirmation-container {
            text-align: center;
            padding: 40px;
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <?php if ($bookingSuccess): ?>
            <h1 class="display-4 text-success">Booking Success!</h1>
            <p class="lead">Thank you for booking with us, <?= htmlspecialchars($nama) ?>.</p>
            <p>Your booking details:</p>
            <ul class="list-group mb-4">
                <li class="list-group-item">Name: <?= htmlspecialchars($nama) ?></li>
                <li class="list-group-item">Phone Number: <?= htmlspecialchars($notelp) ?></li>
                <li class="list-group-item">Booking Date: <?= htmlspecialchars($tanggal) ?></li>
                <li class="list-group-item">Duration: <?= htmlspecialchars($durasi) ?> days</li>
                <li class="list-group-item">Package Price: Rp. <?= number_format($totalPackagePrice, 0, ',', '.') ?></li>
                <li class="list-group-item">Total Bill: Rp. <?= number_format($totalBill, 0, ',', '.') ?></li>
            </ul>
        <?php else: ?>
            <h1 class="display-4 text-danger">Booking Failed</h1>
            <p class="lead">There was an error processing your booking.</p>
            <p>Please try again later.</p>
        <?php endif; ?>
        <a href="?page=home" class="btn btn-primary">Back to Home</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
