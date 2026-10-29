<?php
include 'koneksi.php';

if ($_GET['aksi'] === 'editmapel') {
    $id         = $_POST['id'];
    $kode_mapel = $_POST['kode_mapel'];
    $nama_mapel = $_POST['nama_mapel'];
    $guru_id    = $_POST['guru_id'];

    $sql = "UPDATE mapel set kode_mapel='$kode_mapel', nama_mapel='$nama_mapel', guru_id='$guru_id' WHERE id = '$id'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        echo "<script>alert('Data Berhasil Diubah'); window.location.href='Daftar_mapel.php';</script>";
    } else {
        echo "<script>alert('Data Tidak Berhasil Diubah'); window.location.href='Daftar_mapel.php';</script>";
    }
}
?>