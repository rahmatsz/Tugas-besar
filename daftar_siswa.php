<?php
session_start();
require_once 'koneksi.php';

if (!isset($_SESSION['id']) || ($_SESSION['role'] ?? '') !== 'siswa') {
    header('Location: login.php');
    exit;
}

require_once 'navbar.php';
?>

<div class="container mt-4">
    <h1>Selamat Datang, <?= htmlspecialchars($_SESSION['nama'] ?? $_SESSION['username'], ENT_QUOTES, 'UTF-8') ?></h1>
    <p>Anda login sebagai <b>Siswa</b></p>
    <p>Kelas: <?= htmlspecialchars($_SESSION['kelas'] ?? '-', ENT_QUOTES, 'UTF-8') ?></p>
    <br>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>

<?php require_once 'footer.php'; ?>
