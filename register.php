<?php
require __DIR__.'/config/database.php';
$error=''; $ok='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $nis=trim($_POST['nis']??'');
 $nama=trim($_POST['nama_lengkap']??'');
 $kelas=trim($_POST['kelas']??'');
 $jk=$_POST['jenis_kelamin']??'';
 $username=trim($_POST['username']??'');
 $password=$_POST['password']??'';
 if($nis===''||$nama===''||$kelas===''||$username===''||strlen($password)<8||!in_array($jk,['Laki-laki','Perempuan'],true)){
  $error='Lengkapi seluruh data. Password minimal 8 karakter.';
 } else {
  $conn->begin_transaction();
  try {
   $role='siswa'; $hash=password_hash($password,PASSWORD_DEFAULT);
   $u=$conn->prepare("INSERT INTO users(nama,username,password,role) VALUES(?,?,?,?)");
   $u->bind_param('ssss',$nama,$username,$hash,$role);
   if(!$u->execute()) throw new Exception('Username sudah digunakan.');
   $uid=$conn->insert_id;
   $s=$conn->prepare("INSERT INTO siswa(user_id,nis,nama_lengkap,kelas,jenis_kelamin) VALUES(?,?,?,?,?)");
   $s->bind_param('issss',$uid,$nis,$nama,$kelas,$jk);
   if(!$s->execute()) throw new Exception('NIS sudah digunakan atau data profil tidak valid.');
   $conn->commit(); $ok='Pendaftaran berhasil. Silakan masuk menggunakan username dan password.';
  } catch(Exception $e) {
   $conn->rollback(); $error=$e->getMessage();
  }
 }
}
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Daftar Siswa — SIPN</title><link rel="stylesheet" href="assets/css/style.css"></head>
<body class="auth-page"><div class="auth-wrap"><a class="back" href="index.php">← Kembali</a><section class="auth-card register-card">
<div class="brand"><div class="brand-mark">S</div><div><b>SIPN</b><small>Portal sekolah digital</small></div></div>
<p class="eyebrow">PENDAFTARAN SISWA</p><h1>Form Register User (Siswa)</h1>
<?php if($error): ?><div class="alert"><?=htmlspecialchars($error)?></div><?php endif; ?>
<?php if($ok): ?><div class="success"><?=htmlspecialchars($ok)?></div><?php endif; ?>
<form method="post">
<h2 class="form-section-title">Data Profil User</h2>
<label for="nis">NIS</label><input id="nis" name="nis" required inputmode="numeric" placeholder="Nomor Induk Siswa | Contoh: 1234567890" value="<?=htmlspecialchars($_POST['nis']??'')?>">
<label for="nama_lengkap">Nama Lengkap</label><input id="nama_lengkap" name="nama_lengkap" required placeholder="Nama Lengkap Siswa | Contoh: Ujang Asep" value="<?=htmlspecialchars($_POST['nama_lengkap']??'')?>">
<label for="kelas">Kelas</label><input id="kelas" name="kelas" required placeholder="Kelas Siswa | Contoh: XI RPL 1" value="<?=htmlspecialchars($_POST['kelas']??'')?>">
<label>Jenis Kelamin</label><div class="radio-options"><label><input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki</label><label><input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan</label></div>
<hr class="form-divider"><h2 class="form-section-title">Data Kredensial Akun</h2>
<label for="username">Username</label><input id="username" name="username" required autocomplete="username" placeholder="Username Akun | Contoh: ujang123" value="<?=htmlspecialchars($_POST['username']??'')?>">
<label for="password">Password Akun</label><input id="password" type="password" name="password" required minlength="8" autocomplete="new-password" placeholder="Password Akun | Contoh: password123">
<div class="register-actions"><button class="btn primary">Simpan Data</button><a class="btn secondary" href="login.php">Kembali</a></div>
</form></section></div></body></html>