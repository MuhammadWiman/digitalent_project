<?php

    $dbhost="localhost";
    $dbname="db_wisata";
    $dbuser="root";
    $dbpass= "";

    $koneksi= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if (!$koneksi) {
        die("Koneksi database gagal : ".mysqli_connect_error());
    }
?>