<?php
include 'classes/Wisata.php';
$mysqli = new mysqli("localhost", "root", "", "db_wisataa");
$wisata = new Wisata($mysqli);

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$data = $wisata->getById($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $wisata->update($_GET['id'], $_POST['nama'], $_POST['tujuan'], $_POST['tanggal_kunjungan'], $_POST['jumlah_orang']);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Ubah Data Pengunjung</h2>
<form method="post" action="">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>

    <label>Tujuan:</label><br>
    <input type="text" name="tujuan" value="<?= $data['tujuan'] ?>" required><br><br>

    <label>Tanggal Kunjungan:</label><br>
    <input type="date" name="tanggal_kunjungan" value="<?= $data['tanggal_kunjungan'] ?>" required>

    <label>Jumlah Orang:</label><br>
    <input type="number" name="jumlah_orang" value="<?= $data['jumlah_orang'] ?>" required><br><br>

    <input type="submit" value="Simpan Perubahan" class="btn-edit">
    <a href="index.php" class="btn-delete">Batal</a>
</form>
</body>
</html>
