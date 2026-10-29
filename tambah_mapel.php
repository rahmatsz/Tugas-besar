<?php
require_once 'koneksi.php';
require_once 'navbar.php';
?>

<!-- awal content -->
<div class="container">
<div class="container">
  <div class="row align-items-start">
    <div class="col-2"></div>
    <div class="col-12">
       <br>
       <div class="card">
         <div class="card-header">
          <h3>Form Tambah Mapel</h3>
          </div>
        <div class="card-body">
             <form action="Aksi_tambah_mapel.php" method="POST">
               <hr>
               <h3>Data Mata Pelajaran</h3>
               <div class="mb-3">
                <label for="kode_mapel" class="form-label">Kode Mata Pelajaran:</label>
                <input type="text" class="form-control" id="kode_mapel" name="kode_mapel" placeholder="Kode mapel | Contoh: MP001" required>
            </div>
            
            <div class="mb-3">
                <label for="mata_pelajaran" class="form-label">Nama Mata Pelajaran:</label>
                <input type="text" class="form-control" id="mata_pelajaran" name="nama_mapel" placeholder="Nama Mata Pelajaran | Contoh: Pemrograman" required>
            </div>
               
            <!-- Ubah input text menjadi select dropdown database guru -->
            <div class="mb-3">
                <label for="guru_id" class="form-label">Pilih Guru:</label>
                <select name="guru_id" id="guru_id" class="form-control" required>
                    <option value="">-- Pilih Guru --</option>
                    <?php
                    $sql_guru = "SELECT * FROM guru ORDER BY nama ASC";
                    $query_guru = mysqli_query($koneksi, $sql_guru);
                    while($g = mysqli_fetch_assoc($query_guru)){
                        echo "<option value='".$g['id']."'>".$g['nama']."</option>";
                    }
                    ?>
                </select>
            </div>
            
            <!-- Tombol Aksi -->
            <button type="submit" class="btn btn-primary me-2">Simpan Data</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
             </form>
         </div>
       </div>
    </div>
    <div class="col-2"></div>
  </div>
</div>
</div>

<?php
require_once 'footer.php';
?>