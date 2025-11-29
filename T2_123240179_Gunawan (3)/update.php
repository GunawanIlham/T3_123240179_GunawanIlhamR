<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id=$id"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $no_hp = $_POST['no_hp'];
  $jurusan = $_POST['jurusan'];
  $minat_topik = isset($_POST['minat_topik']) ? implode(", ", $_POST['minat_topik']) : "-";
  $gender = $_POST['gender'] ?? "-";
  $alasan = $_POST['alasan'];

  $sql = "UPDATE pendaftar SET 
          nama='$nama',
          email='$email',
          no_hp='$no_hp',
          jurusan='$jurusan',
          minat_topik='$minat_topik',
          gender='$gender',
          alasan='$alasan'
          WHERE id=$id";

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
  <title>Update Data - Kabar Kampus</title>
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
    <h2>Update Data</h2>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Jurusan</label>
        <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Minat Topik</label><br>
        <?php
        $minatList = ["Teknologi", "Olahraga", "Musik", "Seni"];
        $minatTerpilih = explode(", ", $data['minat_topik']);
        foreach ($minatList as $m) {
          $checked = in_array($m, $minatTerpilih) ? 'checked' : '';
          echo "<input type='checkbox' name='minat_topik[]' value='$m' $checked> $m ";
        }
        ?>
      </div>

      <div class="mb-3">
        <label class="form-label">Gender</label><br>
        <input type="radio" name="gender" value="Laki-laki" <?= ($data['gender']=='Laki-laki')?'checked':'' ?>> Laki-laki
        <input type="radio" name="gender" value="Perempuan" <?= ($data['gender']=='Perempuan')?'checked':'' ?>> Perempuan
      </div>

      <div class="mb-3">
        <label class="form-label">Alasan</label>
        <textarea name="alasan" class="form-control"><?= $data['alasan'] ?></textarea>
      </div>

      <button type="submit" class="btn btn-warning">Update Data</button>
    </form>
  </div>
</body>
</html>
