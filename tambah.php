<?php
include 'classes/Wisata.php';
$mysqli = new mysqli("localhost", "root", "", "db_wisataa");
$wisata = new Wisata($mysqli);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $wisata->add($_POST['nama'], $_POST['tujuan'], $_POST['tanggal'], $_POST['jumlah']);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Tambah Data Pengunjung</h2>
<form method="post" action="">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Tujuan:</label><br>
    <input type="text" name="tujuan" required><br><br>

    <label>Tanggal Kunjungan:</label><br>
    <input type="date" name="tanggal" required><br><br>

    <label>Jumlah Orang:</label><br>
    <input type="number" name="jumlah" required><br><br>

    <input type="submit" value="Simpan" class="btn">
    <a href="index.php" class="btn-delete">Batal</a>
</form>
</body>
</html>
