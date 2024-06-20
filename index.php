<?php
// Definisi lokasi project
$project_location = "/parawisata";
include('./pages/function.php');
$me = $project_location;

// Membuat routing page
$request = $_SERVER['REQUEST_URI'];

// Parsing query string untuk mendapatkan id dan delete_id jika ada
parse_str(parse_url($request, PHP_URL_QUERY), $queryParams);

$id = isset($queryParams['id']) ? $queryParams['id'] : null;
$delete_id = isset($queryParams['delete_id']) ? $queryParams['delete_id'] : null;

switch ($request) {
    case $me.'/' :
        require "pages/home.php";
        break;
    case $me.'/admin'.'?page=booking' :
        require "pages/submit_booking.php";
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
    default:
        if ($id !== null) {
            require "pages/edit.php";
        } elseif ($delete_id !== null) {
            require "pages/admin.php";
        } else {
            http_response_code(404);
            require "pages/404.php";
        }
        break;
}
?>
