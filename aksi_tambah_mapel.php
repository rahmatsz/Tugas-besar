<?php
// memanggil file koneksi database
include 'koneksi.php';

// memastikan data dikirimkan melalui metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // mengamankan data inputan dari pengguna
    $kode_mapel = mysqli_real_escape_string($koneksi, $_POST['kode_mapel']);
    $nama_mapel = mysqli_real_escape_string($koneksi, $_POST['nama_mapel']);
    $guru_id    = mysqli_real_escape_string($koneksi, $_POST['guru_id']);

    // query untuk melakukan INSERT data ke tabel mapel
    $query = "INSERT INTO mapel (kode_mapel, nama_mapel, guru_id) VALUES ('$kode_mapel', '$nama_mapel', '$guru_id')";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        // Jika berhasil, arahkan kembali ke halaman daftar mapel
        echo "<script>alert('Data berhasil ditambahkan');window.location='daftar_mapel.php';</script>";
  } else {
    echo "<script>alert('Gagal menambahkan data');window.location='daftar_mapel';</script>";
  }
} else {
    // Jika file diakses secara langsung tanpa melalui form, arahkan kembali ke halaman tambah
    header("Location: tambah_mapel.php");
    exit();
}
?>