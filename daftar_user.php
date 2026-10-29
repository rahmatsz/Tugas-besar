<?php
include 'koneksi.php';
include 'navbar.php';

$sql = "SELECT users.*, 
COALESCE(siswa.nama, guru.nama) AS nama
FROM users
Left Join siswa ON users.id = siswa.user_id
Left Join guru ON users.id = guru.user_id
order by users.id desc";

$hasil = mysqli_query($koneksi, $sql);
?>

<!-- awal content -->
<div class="container">
<!-- awal kolom -->
<div class="container">
<div class="row align-items-start">
<div class="col-2">
<!--One of three columns  1 -->
</div>
<div class="col-15">
<br>
<!-- awal card -->
<div class="card">
<div class="card-header">
<h3>Tabel</h3>
</div>
<div class="card-body">
<!-- awal Tabel -->
<table class="table">
<thead>
<tr>
<th scope="col">No</th>
<th scope="col">Username</th>
<th scope="col">Role</th>
<th scope="col">Nama</th>
<th scope="col">Aksi</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">1</th>
<td>Akmal12</td>
<td>Siswa</td>
<td>Akmal</td>
<td>
<button type="Edit" class="btn btn-warning">Edit</button>
<button type="Hapus" class="btn btn-danger">Hapus</button>
</td>
</tr>
</tbody>
</table>
<!-- akhir tabel -->
</div>
</div>
<!-- akhir card -->
</div>
</div>
<div class="col-3">
<!-- One of three columns 3 -->
</div>
</div>
</div>
<!-- akhir kolom -->
</div>
<!-- akhir content -->
</div>

<?php
require_once 'footer.php';
?>