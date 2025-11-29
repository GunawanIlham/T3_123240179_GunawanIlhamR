<?php
include 'koneksi.php';

// Ambil ID dari URL
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}
$id = $_GET['id'];

// Ambil data berdasarkan ID
$result = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id=$id");
$data = mysqli_fetch_assoc($result);
if (!$data) {
  echo "Data tidak ditemukan!";
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Pendaftar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="index.php">Kabar Kampus</a>
      <a href="index.php" class="btn btn-light">Kembali</a>
    </div>
  </nav>

  <div class="container my-5">
    <h2>Detail Pendaftar</h2>
    <table class="table table-bordered mt-4">
      <tr><th>Nama</th><td><?= $data['nama'] ?></td></tr>
      <tr><th>Email</th><td><?= $data['email'] ?></td></tr>
      <tr><th>No HP</th><td><?= $data['no_hp'] ?></td></tr>
      <tr><th>Jurusan</th><td><?= $data['jurusan'] ?></td></tr>
      <tr><th>Minat Topik</th><td><?= $data['minat_topik'] ?: '-' ?>.</td></tr>
      <tr><th>Gender</th><td><?= $data['gender'] ?></td></tr>
      <tr><th>Alasan</th><td><?= $data['alasan'] ?></td></tr>
    </table>
  </div>
</body>
</html>
