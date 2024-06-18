<?php
require_once './database/koneksi.php';

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM tbl_pemesan WHERE id=$delete_id";
    if ($koneksi->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }
}
// Retrieve data from database
$sql = "SELECT id FROM tbl_pemesan";
$result = $koneksi->query($sql);

$ids = array();
while ($row = $result->fetch_object()) {
    $ids[] = $row->id;
}
$id = implode(",", $ids);
?>