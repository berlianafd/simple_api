<?php

require_once 'koneksi.php';

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $notelp = $_POST['notelp'];

    // buat query update
    $query = mysqli_query($koneksi, "UPDATE admin SET username='$username', password='$password' , notelp='$notelp' WHERE id_user = '$id_user'");

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: accounts.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>