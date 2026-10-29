<?php
include 'koneksi.php';
include 'navbar.php';

// Mengambil data mata pelajaran beserta guru pengampunya
$sql_mapel = "SELECT mapel.*, guru.nama AS nama_guru 
              FROM mapel 
              LEFT JOIN guru ON mapel.guru_id = guru.id";
$hasil_mapel = mysqli_query($koneksi, $sql_mapel);
$data_mapel = [];
if ($hasil_mapel && mysqli_num_rows($hasil_mapel) > 0) {
    while ($row = mysqli_fetch_assoc($hasil_mapel)) {
        $data_mapel[] = $row;
    }
}

// Mengambil data siswa dan kelasnya
$sql_siswa = "SELECT id, nama, kelas FROM siswa";
$hasil_siswa = mysqli_query($koneksi, $sql_siswa);
$data_siswa = [];
if ($hasil_siswa && mysqli_num_rows($hasil_siswa) > 0) {
    while ($row = mysqli_fetch_assoc($hasil_siswa)) {
        $data_siswa[] = $row;
    }
}
?>

<!-- awal content -->
<div class="container">
  <div class="row align-items-start">
    <div class="col-3"></div>
    <div class="col-15">
       <br>
       <!-- awal card -->
       <div class="card">
         <div class="card-header text-center">
            <h3>Tambah Data Mengajar</h3>
          </div>
        <div class="card-body">
            <!-- awal Form -->
            <form action="aksi_tambah_mengajar.php" method="POST">
              
              <div class="mb-3">
                <label for="mapel_id" class="form-label">Mata Pelajaran & Guru Pengampu</label>
                <select class="form-select" id="mapel_id" name="mapel_id" required>
                  <option value="">-- Pilih Mapel & Guru --</option>
                  <?php foreach ($data_mapel as $m) { ?>
                    <option value="<?= $m['id'] ?>">
                      <?= $m['kode_mapel'] ?> - <?= $m['nama_mapel'] ?> (Guru: <?= !empty($m['nama_guru']) ? $m['nama_guru'] : '-' ?>)
                    </option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="siswa_id" class="form-label">Siswa & Kelas</label>
                <select class="form-select" id="siswa_id" name="siswa_id" required>
                  <option value="">-- Pilih Siswa --</option>
                  <?php foreach ($data_siswa as $s) { ?>
                    <option value="<?= $s['id'] ?>">
                      <?= $s['nama'] ?> (Kelas: <?= $s['kelas'] ?>)
                    </option>
                  <?php } ?>
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="mengajar.php" class="btn btn-secondary">Kembali</a>
            </form>
            <!-- akhir form -->
         </div>
       </div>
       <!-- akhir card -->
    </div>
    <div class="col-3"></div>
  </div>
</div>
<!-- akhir content -->

<?php
require_once 'footer.php';
?>