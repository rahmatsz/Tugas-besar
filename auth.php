<?php
if(session_status()===PHP_SESSION_NONE) session_start();
function wajib_login(){ if(empty($_SESSION['user'])) { header('Location: '.(strpos($_SERVER['PHP_SELF'],'/admin/')!==false||strpos($_SERVER['PHP_SELF'],'/guru/')!==false||strpos($_SERVER['PHP_SELF'],'/siswa/')!==false?'../login.php':'login.php')); exit; } }
function wajib_role($role){wajib_login();if(($_SESSION['role']??'')!==$role){header('Location: ../index.php');exit;}}
function nama_user(){return htmlspecialchars($_SESSION['nama']??$_SESSION['username']??'Pengguna',ENT_QUOTES,'UTF-8');}
function h($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
