<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['role'])) {
    header('Location: login.php');
    exit;
}

$role = $_SESSION['role'];

switch ($role) {
    case 'admin':
        header('Location: daftar_user.php');
        exit;
    case 'guru':
        header('Location: daftar_guru.php');
        exit;
    case 'siswa':
        header('Location: daftar_siswa.php');
        exit;
    default:
        session_destroy();
        header('Location: login.php');
        exit;
}
?>
