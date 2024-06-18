<?php
require_once './database/koneksi.php';

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM tbl_pemesan WHERE id=$delete_id";
    if ($koneksi->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: /parawisata/admin");
    } else {
        echo "Error deleting record: " . $koneksi->error;
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
                                    <a href='/parawisata/edit?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
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
