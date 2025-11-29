<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kabar Kampus - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand">Kabar Kampus</a>
      <div class="d-flex">
        <a href="form.php" class="btn btn-light">Form Registrasi</a>
      </div>
    </div>
  </nav>

  <!-- Konten -->
  <div class="container my-5">
    <h2 class="mb-4">Data Pendaftar</h2>

    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM pendaftar ORDER BY id DESC");
    if (mysqli_num_rows($query) == 0) {
        echo "<p>Tidak ada data.</p>";
    } else {
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Jurusan</th><th>Aksi</th></tr></thead>';
        echo '<tbody>';
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['jurusan']}</td>
                    <td>
                      <a href='detail.php?id={$row['id']}' class='btn btn-info btn-sm'>Detail</a>
                      <a href='update.php?id={$row['id']}' class='btn btn-warning btn-sm'>Update</a>
                      <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin hapus data ini?\")'>Hapus</a>
                    </td>
                  </tr>";
        }
        echo '</tbody></table>';
    }
    ?>
  </div>
</body>
</html>
