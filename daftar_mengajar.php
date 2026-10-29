<?php
  include 'koneksi.php';
  include 'navbar.php';

// Menggabungkan tabel mapel dan guru menggunakan JOIN
$sql = "SELECT guru.nama AS nama_guru, siswa.kelas, mapel.kode_mapel, mapel.nama_mapel
FROM guru
JOIN mapel ON guru.id = mapel.guru_id
JOIN mengajar ON mapel.id = mengajar.mapel_id
JOIN siswa ON siswa.id = mengajar.siswa_id";

$hasil = mysqli_query($koneksi, $sql);
$data = [];
if (mysqli_num_rows($hasil) > 0) {
  while($baris = mysqli_fetch_assoc($hasil)) {
    $data[] = $baris;
  }
}
?>

<!-- awal content -->
<div class="container">
<div class="container">
  <div class="row align-items-start">
    <div class="col-3"></div>
    <div class="col-15">
       <br>
       <div class="card">
         <div class="card-header">
          <h3>Tabel Data Mata Pelajaran</h3>
          </div>
        <div class="card-body">
             <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Guru</th>
      <th scope="col">Kelas</th>
      <th scope="col">Kode_mapel</th>
      <th scope="col">Nama_mapel</th> <!-- Ubah header kolom dari guru_id -->
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    for($i = 0; $i < count($data); $i++){
    ?>
    <tr>
      <th scope="row"><?php echo $no++ ?></th>
      <!-- Menampilkan Nama Guru, beri fallback '-' jika kosong -->
      <td><?= !empty($data[$i]['nama_guru']) ? $data[$i]['nama_guru'] : '-' ?></td>
      <td><?= $data[$i]['kelas'] ?></td>
      <td><?= $data[$i]['kode_mapel'] ?></td>
      <td><?= $data[$i]['nama_mapel'] ?></td>
      <td>
        <a href="Form_edit_mengajar.php?id=<?= $data[$i]['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="aksi_hapus_mengajar.php?id=<?= $data[$i]['id'] ?>" onclick="return confirm ('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
             </table>
         </div>
       </div>
    </div>
    <div class="col-3"></div>
  </div>
</div>
</div>

<?php
require_once 'footer.php';
?>