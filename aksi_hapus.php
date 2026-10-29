<?php

require_once 'koneksi.php';

$id = $_GET['id'];
$role = $_GET['role'];

if ($role == 'siswa') {
  echo 'ini untuk hapus siswa';
  // untuk menghapus data dari tabel user dan siswa

  $sql = "DELETE users, siswa FROM users JOIN siswa ON siswa.user_id = users.id WHERE users.id = '$id'";

  if (mysqli_query($koneksi,$sql)) {
    echo "<script>alert('User Berhasil di hapus');window.location.href='daftar_user.php';</script>";
  }else {
    echo "<script>alert('User Tidak Berhasil di hapus');window.location.href='daftar_user.php';</script>";
  }
  
}elseif ($role == 'guru') {
  echo 'ini untuk hapus guru';
 // untuk menghapus data dari tabel user dan guru
  
 // $sql = "DELETE FROMM users WHERE id = '$id'";

  // query untuk menghapus dari data tabel user dan guru 
  $sql = "DELETE users, guru FROM users JOIN guru ON guru.user_id = users.id WHERE users.id = '$id'";

  if (mysqli_query($koneksi,$sql)) {
    echo "<script>alert('User Berhasil di hapus');window.location.href='daftar_user.php';</script>";
  }else {
    echo "<script>alert('User Tidak Berhasil di hapus');window.location.href='daftar_user.php';</script>";
  }
  exit;
}else {
  echo 'ini untuk hapus admin';
  // untuk menghapus data dari tabel user

  $sql = "DELETE users FROM users WHERE id = '$id'";

  if (mysqli_query($koneksi,$sql)) {
    echo "<script>alert('User Berhasil di hapus');window.location.href='daftar_user.php';</script>";
  }else {
    echo "<script>alert('User Tidak Berhasil di hapus');window.location.href='daftar_user.php';</script>";
  }
}