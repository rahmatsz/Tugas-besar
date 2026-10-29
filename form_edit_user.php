<?php
require_once 'koneksi.php';
require_once 'navbar.php';

$role = $_GET['role'] ?? '';
$id   = $_GET['id'] ?? 0;

if ($role == 'admin') {
  $sql = "SELECT * FROM users WHERE id = $id AND role = 'admin'";
  $admin = mysqli_fetch_assoc(mysqli_query($koneksi, $sql));
  ?>

  <!-- form edit admin -->
  <div class="container">
    <div class="row align-items-start">
      <div class="col-2"></div>
      <div class="col-12">
        <br>
        <div class="card">
          <div class="card-header">
            <h3>Form Edit User (Admin)</h3>
          </div>
          <div class="card-body">
            <form action="aksi_edit_user.php?aksi=editadmin" method="POST">
              
              <h3>Data Kredensial Akun</h3>

              <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" 
                       value="<?= htmlspecialchars($admin['username'] ?? '') ?>" 
                       placeholder="Username Akun" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password Akun:</label>
                <input type="password" class="form-control" id="password" name="password" 
                       placeholder="Password Baru | jika tidak diubah, maka kosongkan saja">
              </div>

              <input type="hidden" name="role" value="admin">
              <input type="hidden" name="id" value="<?= $admin['id'] ?? '' ?>">

              <button type="submit" name="edit" class="btn btn-primary me-2">Ubah Data</button>
              <a href="daftar_user2.php" class="btn btn-secondary">Kembali</a>
            </form>
          </div>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
  <!-- end form edit admin -->

<?php
} elseif ($role == 'guru') {
  $sql = "SELECT users.*, guru.id AS guru_id, guru.nip, guru.nama, guru.jenis_kelamin, guru.user_id 
          FROM users 
          JOIN guru ON users.id = guru.user_id 
          WHERE users.id = $id";
  $guru = mysqli_fetch_assoc(mysqli_query($koneksi, $sql));
  ?>

  <!-- form edit guru -->
  <div class="container">
    <div class="row align-items-start">
      <div class="col-2"></div>
      <div class="col-12">
        <br>
        <div class="card">
          <div class="card-header">
            <h3>Form Edit User (Guru)</h3>
          </div>
          <div class="card-body">
            <form action="aksi_edit_user.php?aksi=editguru" method="POST">
              <h3>Data Profil Guru</h3>

              <div class="mb-3">
                <label for="nip" class="form-label font-weight-bold">NIP:</label>
                <input type="text" class="form-control" id="nip" name="nip" 
                       value="<?= htmlspecialchars($guru['nip'] ?? '') ?>" 
                       placeholder="Nomor Induk Pegawai | Contoh: 198001012010011001" required>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama" name="nama" 
                       value="<?= htmlspecialchars($guru['nama'] ?? '') ?>" 
                       placeholder="Nama Lengkap Guru" required>
              </div>

              <div class="mb-3">
                <label class="form-label d-block">Jenis Kelamin:</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="L" 
                         <?= (isset($guru['jenis_kelamin']) && $guru['jenis_kelamin'] == 'L') ? 'checked' : '' ?>>
                  <label class="form-check-label" for="laki">Laki-laki</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P" 
                         <?= (isset($guru['jenis_kelamin']) && $guru['jenis_kelamin'] == 'P') ? 'checked' : '' ?>>
                  <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
              </div>

              <hr>
              <h3>Data Kredensial Akun</h3>

              <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" 
                       value="<?= htmlspecialchars($guru['username'] ?? '') ?>" 
                       placeholder="Username Akun" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password Akun:</label>
                <input type="password" class="form-control" id="password" name="password" 
                       placeholder="Password Baru | jika tidak diubah, maka kosongkan saja">
              </div>

              <input type="hidden" name="role" value="guru">
              <input type="hidden" name="id" value="<?= $guru['guru_id'] ?? '' ?>">
              <input type="hidden" name="user_id" value="<?= $guru['user_id'] ?? '' ?>">

              <button type="submit" name="edit" class="btn btn-primary me-2">Ubah Data</button>
              <a href="daftar_user2.php" class="btn btn-secondary">Kembali</a>
            </form>
          </div>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
  <!-- end form edit guru -->

<?php
} elseif ($role == 'siswa') {
  $sql = "SELECT users.*, siswa.id AS siswa_id, siswa.nis, siswa.nama, siswa.kelas, siswa.jenis_kelamin, siswa.user_id 
          FROM users 
          JOIN siswa ON users.id = siswa.user_id 
          WHERE users.id = $id";
  $siswa = mysqli_fetch_assoc(mysqli_query($koneksi, $sql));
  ?>

  <!-- form edit siswa -->
  <div class="container">
    <div class="row align-items-start">
      <div class="col-2"></div>
      <div class="col-12">
        <br>
        <div class="card">
          <div class="card-header">
            <h3>Form Edit User (Siswa)</h3>
          </div>
          <div class="card-body">
            <form action="aksi_edit_user.php?aksi=editsiswa" method="POST">
              <h3>Data Profil Siswa</h3>

              <div class="mb-3">
                <label for="nis" class="form-label font-weight-bold">NIS:</label>
                <input type="text" class="form-control" id="nis" name="nis" 
                       value="<?= htmlspecialchars($siswa['nis'] ?? '') ?>" 
                       placeholder="Nomor Induk Siswa | Contoh: 1234567890" required>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama" name="nama" 
                       value="<?= htmlspecialchars($siswa['nama'] ?? '') ?>" 
                       placeholder="Nama Lengkap Siswa | Contoh: Ujang Asep" required>
              </div>

              <div class="mb-3">
                <label for="kelas" class="form-label">Kelas:</label>
                <input type="text" class="form-control" id="kelas" name="kelas" 
                       value="<?= htmlspecialchars($siswa['kelas'] ?? '') ?>" 
                       placeholder="Kelas Siswa | Contoh: XI-RPL-1" required>
              </div>

              <div class="mb-3">
                <label class="form-label d-block">Jenis Kelamin:</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="L" 
                         <?= (isset($siswa['jenis_kelamin']) && $siswa['jenis_kelamin'] == 'L') ? 'checked' : '' ?>>
                  <label class="form-check-label" for="laki">Laki-laki</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P" 
                         <?= (isset($siswa['jenis_kelamin']) && $siswa['jenis_kelamin'] == 'P') ? 'checked' : '' ?>>
                  <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
              </div>

              <hr>
              <h3>Data Kredensial Akun</h3>

              <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" 
                       value="<?= htmlspecialchars($siswa['username'] ?? '') ?>" 
                       placeholder="Username Akun | Contoh: ujang123" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password Akun:</label>
                <input type="password" class="form-control" id="password" name="password" 
                       placeholder="Password Baru | jika tidak diubah, maka kosongkan saja">
              </div>

              <input type="hidden" name="role" value="siswa">
              <input type="hidden" name="id" value="<?= $siswa['siswa_id'] ?? '' ?>">
              <input type="hidden" name="user_id" value="<?= $siswa['user_id'] ?? '' ?>">

              <button type="submit" name="edit" class="btn btn-primary me-2">Ubah Data</button>
              <a href="daftar_user2.php" class="btn btn-secondary">Kembali</a>
            </form>
          </div>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
  <!-- end form edit siswa -->

<?php
} else {
  echo "<script>alert('Role tidak valid'); window.location.href='daftar_user2.php';</script>";
}

require_once 'footer.php';
?>