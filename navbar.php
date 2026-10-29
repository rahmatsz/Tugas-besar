<?php

//mengecek status session jika tidak ada session, maka jalankan session_start()

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

//mengambil data dari variabel session
$username = $_SESSION['username'] ?? 'user';
$nama = $SESSION['nama'] ?? 'admin';
$role = $SESSION['role'] ?? '';
?>

<!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Bootstrap demo</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        </head>
        <body>

        <!-- start navbar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

          <?php
if ($role === 'admin') {
  // code untuk menu admin
  ?>
          
<?php } elseif ($role === 'guru') {
  // code untuk menu guru
  ?>
          
<?php } elseif ($role === 'siswa') {
  // code untuk menu siswa
  ?>

  <?php
  }?>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Tabel.php">Tabel</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="Form.php">Form</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    latihan
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="latihan.php">Tambah User 1</a></li>
                    <li><a class="dropdown-item" href="latihan2.php">Tambah User 2</a></li>
                    <li><a class="dropdown-item" href="latihan3.php">Tambah User 3</a></li>
                    <li><a class="dropdown-item" href="latihan4.php">Tambah User 4</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here </a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>
        <!-- end navbar -->