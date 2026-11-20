<?php
session_start(); require __DIR__.'/config/database.php';
$error='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
 $username=trim($_POST['username'] ?? ''); $password=$_POST['password'] ?? '';
 $stmt=$conn->prepare("SELECT id,nama,username,password,role FROM users WHERE username=? LIMIT 1");
 $stmt->bind_param('s',$username); $stmt->execute(); $result=$stmt->get_result(); $u=$result->fetch_assoc();
 if ($u && password_verify($password,$u['password'])) {
  session_regenerate_id(true); $_SESSION['user']=$u['id']; $_SESSION['nama']=$u['nama']; $_SESSION['username']=$u['username']; $_SESSION['role']=$u['role'];
  $dest=$u['role']==='admin'?'admin/index.php':($u['role']==='guru'?'guru/index.php':'siswa/index.php');
  header("Location: $dest"); exit;
 } else $error='Username atau password tidak sesuai.';
}
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Masuk — SIPN</title><link rel="stylesheet" href="assets/css/style.css"></head><body class="auth-page">
<div class="auth-wrap"><a class="back" href="index.php">← Kembali</a><section class="auth-card"><div class="brand"><div class="brand-mark">S</div><div><b>SIPN</b><small>Portal sekolah digital</small></div></div><p class="eyebrow">SELAMAT DATANG KEMBALI</p><h1>Masuk akun</h1>
<?php if($error): ?><div class="alert"><?= htmlspecialchars($error) ?></div><?php endif; ?>
<form method="post"><label>Username</label><input name="username" required autocomplete="username" placeholder="Masukkan username"><label>Password</label><input type="password" name="password" required autocomplete="current-password" placeholder="Masukkan password"><button class="btn primary full">Masuk</button></form><p class="form-note">Belum punya akun? <a href="register.php">Daftar di sini</a></p></section></div></body></html>