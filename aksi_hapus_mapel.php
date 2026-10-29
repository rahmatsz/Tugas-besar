<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = mysqli_prepare($koneksi, "DELETE FROM mapel WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                alert('Data mapel berhasil dihapus!');
                window.location = 'daftar_mapel.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');
                window.location = 'daftar_mapel.php';
              </script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
} else {
    header('Location: daftar_mapel.php');
}
?>