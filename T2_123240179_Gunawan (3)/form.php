<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $password = $_POST['password'];
    $jurusan = $_POST['jurusan'];

    
    $minat = isset($_POST['minat_topik']) ? implode(", ", $_POST['minat_topik']) : "-";

    $gender = $_POST['gender'] ?? "-";
    $alasan = $_POST['alasan'];

    $sql = "INSERT INTO pendaftar (nama, email, no_hp, password, jurusan, minat_topik, gender, alasan)
            VALUES ('$nama','$email','$telepon','$password','$jurusan','$minat','$gender','$alasan')";
    mysqli_query($koneksi, $sql);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir Pendaftaran - Kabar Kampus</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="index.php">Kabar Kampus</a>
      <div class="d-flex">
        <a href="index.php" class="btn btn-danger">Kembali</a>
      </div>
    </div>
  </nav>

  <!-- Formulir -->
  <div class="container my-5">
    <h2 class="mb-4">Formulir Pendaftaran Akun</h2>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Alamat Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Nomor Telepon</label>
        <input type="text" class="form-control" name="telepon" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password Akun</label>
        <input type="password" class="form-control" name="password" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Jurusan</label>
        <select class="form-select" name="jurusan" required>
          <option value="">-- Pilih Jurusan --</option>
          <option>Teknik Informatika</option>
          <option>Sistem Informasi</option>
          <option>Teknik Elektro</option>
          <option>Manajemen</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Minat Topik</label><br>
        <input type="checkbox" name="minat_topik[]" value="Teknologi"> Teknologi
        <input type="checkbox" name="minat_topik[]" value="Olahraga"> Olahraga
        <input type="checkbox" name="minat_topik[]" value="Musik"> Musik
        <input type="checkbox" name="minat_topik[]" value="Seni"> Seni
      </div>

      <div class="mb-3">
        <label class="form-label">Gender</label><br>
        <input type="radio" name="gender" value="Laki-laki"> Laki-laki
        <input type="radio" name="gender" value="Perempuan"> Perempuan
      </div>

      <div class="mb-3">
        <label class="form-label">Alasan Bergabung</label>
        <textarea class="form-control" name="alasan" rows="3"></textarea>
      </div>

      <button type="submit" class="btn btn-success">Daftar Sekarang</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
  </div>
</body>
</html>
