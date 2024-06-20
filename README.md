## Pemesanan Paket Wisata dengan PHP (XAMPP)

Ini adalah program sederhana pemesanan paket wisata menggunakan PHP dan MySQL untuk XAMPP. Program ini memungkinkan pengguna untuk melakukan pemesanan paket wisata dengan berbagai opsi dan fasilitas tambahan.

1.Daftar Isi
2.Instalasi
3.Konfigurasi
4.Struktur Direktori
5.Menjalankan Program
6.Fitur
7.Teknologi yang Digunakan
8.Catatan Penting
9.Kontribusi

## Langkah-langkah instalasi program:

Clone repositori ini ke direktori lokal Anda atau unduh file ZIP.

```sh
git clone https://github.com/nama_pengguna/repositori.git
```

Pindahkan atau salin folder ini ke dalam direktori XAMPP (htdocs).

## Konfigurasi

Konfigurasi basis data:
Import database yang disediakan ke dalam MySQL menggunakan phpMyAdmin atau alat manajemen database lainnya.

Sesuaikan file konfigurasi basis data di ./database/koneksi.php dengan pengaturan basis data lokal Anda:

```sh
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'nama_database';
```

## Struktur Direktori

Penjelasan singkat tentang struktur direktori program.

```sh
/parawisata
├── database/ # Direktori berisi skrip database dan koneksi
│ ├── koneksi.php # Berkas koneksi ke basis data
│ ├── schema.sql # Skema basis data
│ └── ...
├── pages/ # Direktori berisi halaman PHP
│ ├── admin.php # Halaman admin
│ ├── pemesanan.php # Halaman pemesanan
│ ├── submit_booking.php # Halaman submit booking
│ └── ...
├── .gitignore # Berkas untuk mengabaikan file dalam Git
├── index.php # Berkas utama untuk routing
├── README.md # Ini sendiri
└── ...
```

## Struktur url endpoint

Berikut struktur url endpoint pada website ini :

```sh
#Halaman Home
http://localhost/parawisata/
http://localhost/parawisata/?page=home

#halaman pemesanan
http://localhost/parawisata/?page=pemesanan

#halaman Riwayat Pemesanan
http://localhost/parawisata/?page=admin
```

## Menjalankan Program

1.Pastikan XAMPP telah dijalankan dan layanan Apache dan MySQL aktif.
2.Buka browser dan navigasikan ke http://localhost/parawisata/ untuk memulai aplikasi.

## Fitur

Deskripsi singkat tentang fitur-fitur utama program:

1.Pemesanan paket wisata.
2.Pengelolaan data pemesanan oleh admin.
3.Form pemesanan dengan validasi input.

## Teknologi yang Digunakan

1.PHP
2.MySQL
3.HTML
4.CSS (Bootstrap)
5.JavaScript (jQuery)

## Catatan Penting

Catatan atau hal-hal yang perlu diperhatikan pengguna atau pengembang:

Pastikan koneksi internet tidak terputus saat menggunakan program ini.
Periksa kembali konfigurasi basis data sebelum menjalankan program.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan buat pull request dengan perubahan yang diusulkan.
