<?php
require_once 'koneksi.php';

if (isset($_POST['tambah'])) {

    $username = $_POST['username'];
    $pass     = $_POST['password'];
    $role     = $_POST['role'];

    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $jk   = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';

    // Hash password
    $password_hash = password_hash($pass, PASSWORD_DEFAULT);

    // Insert ke tabel users
    $sql_user = "INSERT INTO users 
                (username, password, role, created_at)
                VALUES 
                ('$username', '$password_hash', '$role', NOW())";

    $hasil_user = mysqli_query($koneksi, $sql_user);

    if (!$hasil_user) {
        die("Gagal menambahkan user: " . mysqli_error($koneksi));
    }

    $user_id = mysqli_insert_id($koneksi);

    // ROLE SISWA
    if ($role == 'siswa') {
        $nis   = $_POST['nis'];
        $kelas = $_POST['kelas'];

        $sql_siswa = "INSERT INTO siswa
                     (nis, nama, kelas, jenis_kelamin, user_id)
                     VALUES
                     ('$nis', '$nama', '$kelas', '$jk', '$user_id')";

        $hasil = mysqli_query($koneksi, $sql_siswa);

        if (!$hasil) {
            die("Gagal menambahkan data siswa: " . mysqli_error($koneksi));
        }
    }

    // ROLE GURU
    elseif ($role == 'guru') {
        $nip = $_POST['nip'];

        $sql_guru = "INSERT INTO guru
                    (nip, nama, jenis_kelamin, user_id)
                    VALUES
                    ('$nip', '$nama', '$jk', '$user_id')";

        $hasil = mysqli_query($koneksi, $sql_guru);

        if (!$hasil) {
            die("Gagal menambahkan data guru: " . mysqli_error($koneksi));
        }
    }

    // ROLE ADMIN
    elseif ($role == 'admin') {
        // Admin hanya butuh data di tabel users saja
        $hasil = true;
    }

    // Cek hasil
    if ($hasil) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location.href='daftar_user2.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
                window.location.href='formall.php';
              </script>";
    }

} else {
    echo "<script>
            alert('Tidak boleh langsung mengakses halaman ini!');
            window.location.href='formall.php';
          </script>";
}
?>