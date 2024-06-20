<?php
    require_once './database/koneksi.php';
    $sql = "SELECT * FROM tbl_pemesan";
    $result = $koneksi->query($sql);

    
?>
