<?php

require_once 'koneksi.php';

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id_sampah = $_POST['id_sampah'];
    $namaSampah = $_POST['namaSampah'];
    $hargaSampah = $_POST['hargaSampah'];

    // buat query update
    $query = mysqli_query($koneksi, "UPDATE hargasampah SET namaSampah='$namaSampah', hargaSampah='$hargaSampah' WHERE id_sampah = '$id_sampah'");

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: hargasampah.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>