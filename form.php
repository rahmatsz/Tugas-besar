<?php
require_once 'navbar.php';
?>

<!-- awal content -->
<div class="container">
<!-- awal kolom -->
<div class="container">
  <div class="row align-items-start">
    <div class="col-2">
      <!--One of three columns  1 -->
    </div>
    <div class="col-12">
       <br>
      <!-- awal card -->
       <div class="card">
         <div class="card-header">
          <h3>Form Tambah User (siswa)</h3>
          </div>
        <div class="card-body">
            <!-- awal form -->
             <form action="aksi_tambah_user.php" method="POST">
               <h3>data profil user 2</h3>
           <div class="mb-3">
                <label for="nis" class="form-label font-weight-bold">NIS:</label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa | Contoh: 1234567890" required>
            </div>
            
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap Siswa | Contoh: Ujang Asep" required>
            </div>
            
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas:</label>
                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas Siswa | Contoh: XI-RPL-1" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label d-block">Jenis Kelamin:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="L" checked>
                    <label class="form-check-label" for="laki">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P">
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
            </div>
               <hr>
               <h3>Data Kredensial Akun</h3>
               <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username Akun | Contoh: ujang123" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password Akun:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password Akun | Contoh: password123" required>
            </div>
            
            <div class="mb-4">
                <input type="text" class="form-control" id="role" name="role" value="siswa" readonly>
            </div>
            
            <!-- Tombol Aksi -->
            <button type="submit" name="tambah" class="btn btn-primary me-2">Simpan Data</button>
            <a href="tabel.php" class="btn btn-secondary">Kembali</a>
            
             </form>
            <!-- akhir form -->
         </div>
       </div>
      <!-- akhir card -->
      
    </div>
    <div class="col-2">
      <!--One of three columns 3 -->
    </div>
  </div>
</div>
  <!-- akhir kolom -->
  
</div>
<!-- akhir content -->

<?php
require_once 'footer.php';
?>