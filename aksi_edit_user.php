<?php
require_once 'koneksi.php';

  if ($_GET['aksi'] === 'editadmin') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    if ($pass !== "") {
        $password_hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET username='$username', password='$password_hash', role='$role' WHERE id = '$id'";
        $result = mysqli_query($koneksi, $sql);
    } else {
        $sql = "UPDATE users SET username='$username', role='$role' WHERE id = '$id'";
        $result = mysqli_query($koneksi, $sql);
    }

    if ($result) {
        echo "<script>alert('Data Berhasil Diubah'); window.location.href='daftar_user.php';</script>";
    } else {
        echo "<script>alert('Data Tidak Berhasil Diubah'); window.location.href='daftar_user.php';</script>";
    }
    
  } elseif ($_GET['aksi'] === 'editguru') {
  
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    if ($pass !== "") {
        $password_hash = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET username='$username', password='$password_hash', role='$role' WHERE id = '$user_id'";
        $result = mysqli_query($koneksi, $sql);
    } else {
        $sql = "UPDATE users SET username='$username', role='$role' WHERE id = '$user_id'";
        $result = mysqli_query($koneksi, $sql);
    }

    $sql = "UPDATE guru SET nip='$nip', nama='$nama', jenis_kelamin='$jk' WHERE id='$id'";

    $hasil = mysqli_query($koneksi, $sql);

    if ($result && $hasil) {
        echo "<script>alert('Data Berhasil Diubah'); window.location.href='daftar_guru.php';</script>";
    } else {
        echo "<script>alert('Data Tidak Berhasil Diubah'); window.location.href='daftar_guru.php';</script>";
    }
  } elseif ($_GET['aksi'] === 'editsiswa') {

    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jk = $_POST['jenis_kelamin'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    if ($pass !== "") {
        $password_hash = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET username='$username', password='$password_hash', role='$role' WHERE id = '$user_id'";
        $result = mysqli_query($koneksi, $sql);
    } else {
        $sql = "UPDATE users SET username='$username', role='$role' WHERE id = '$user_id'";
        $result = mysqli_query($koneksi, $sql);
    }

    $sql = "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', jenis_kelamin='$jk' WHERE id='$id'";

    $hasil = mysqli_query($koneksi, $sql);

    if ($result && $hasil) {
        echo "<script>alert('Data Berhasil Diubah'); window.location.href='daftar_siswa.php';</script>";
    } else {
        echo "<script>alert('Data Tidak Berhasil Diubah'); window.location.href='daftar_siswa.php';</script>";
    }
  }