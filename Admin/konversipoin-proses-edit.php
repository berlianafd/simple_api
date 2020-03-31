<?php

require_once 'koneksi.php';

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $poin = $_POST['poin'];
    $harga = $_POST['harga'];

    // buat query update
    $query = mysqli_query($koneksi, "UPDATE konversi_poin SET poin='$poin', harga='$harga' WHERE id='$id'");

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: konversipoin.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>