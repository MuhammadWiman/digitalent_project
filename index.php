<?php
    //definisi lokasi project
    $project_location = "/parawisata";
    include('./pages/function.php');
    $me = $project_location;
    //membuat routing page
    $request = $_SERVER['REQUEST_URI'];

    switch ($request) {
        case $me.'/' :
            require "pages/home.php";
            break;
        case $me.'/admin' :
            require "pages/admin.php";
            break;
        case $me.'/pemesanan' :
            require "pages/pemesanan.php";
            break;
        case $me.'/?page=pemesanan' :
            require "pages/pemesanan.php";
            break;
        case $me.'/?page=home' :
            require "pages/home.php";
            break;
        case $me.'/?page=admin' :
            require "pages/admin.php";
            break;
        case $me.'/?page=booking' :
            require "pages/submit_booking.php";
            break;
        case $me.'/add' :
            require "pages/add.php";
            break;
        case $me.'/edit?id=' . $id :
            require "pages/edit.php";
            break;
        case $me.'/admin?delete_id=' . $id :
            require "pages/admin.php";
            break;
        default:
            http_response_code(404);
            require "pages/404.php";
            break;
       
    }
?>