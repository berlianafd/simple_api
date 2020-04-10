<?php

require_once 'koneksi.php';

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id_jenis = $_POST['id_jenis'];
    $nama_jenis = $_POST['nama_jenis'];
    $poin = $_POST['poin'];
    $harga = $_POST['harga'];

    // buat query update
    $query = mysqli_query($koneksi, "UPDATE konversiharga SET nama_jenis='$nama_jenis', harga='$harga', poin='$poin', WHERE id_jenis='$id_jenis'");

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: konversiharga.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>
