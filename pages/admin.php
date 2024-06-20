<?php
require_once './database/koneksi.php';

// Handle delete request
    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $sql = "DELETE FROM tbl_pemesan WHERE id=$delete_id";
        if ($koneksi->query($sql) === TRUE) {
            echo '<script>
                    alert("Delete Data berhasil");
                    window.location.href = "?page=admin";
                  </script>';
            exit;
        } else {
            echo '<script>
                    alert("Delete Data gagal !!!");
                    window.location.href = "?page=admin";
                  </script>';
            exit;
        }
    }
    // Retrieve data from database
    $sql = "SELECT * FROM tbl_pemesan";
    $result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                            <a class="nav-link active" href="?page=admin">Riwayat Pemesanan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container mt-4">
        <h1 class="mb-4">Manage Bookings</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>No Telp</th>
                    <th>Tanggal</th>
                    <th>Durasi</th>
                    <th>Jenis Paket</th>
                    <th>Travel</th>
                    <th>Dinner</th>
                    <th>Harga Paket</th>
                    <th>Total Bill</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nama']}</td>
                                <td>{$row['no_telp']}</td>
                                <td>{$row['tanggal']}</td>
                                <td>{$row['durasi']}</td>
                                <td>{$row['jenis_paket']}</td>
                                <td>" . ($row['travel'] ? 'Yes' : 'No') . "</td>
                                <td>" . ($row['dinner'] ? 'Yes' : 'No') . "</td>
                                <td>Rp. " . number_format($row['harga_paket'], 0, ',', '.') . "</td>
                                <td>Rp. " . number_format($row['total_bill'], 0, ',', '.') . "</td>
                                <td>
                                    <a href='?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='?delete_id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="/parawisata/?page=pemesanan" class="btn btn-primary">Add New Booking</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
