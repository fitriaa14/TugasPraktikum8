<?php
require_once 'Pengunjung.php';
$pengunjung = new Pengunjung();
$data = $pengunjung->tampilkanData();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pengunjung Wisata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Pengunjung Wisata</h1>
    <table>
        <tr>
            <th>Nama</th>
            <th>Tujuan</th>
            <th>Tanggal Kunjungan</th>
            <th>Jumlah Orang</th>
        </tr>
        <?php while ($row = $data->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['tujuan'] ?></td>
            <td><?= $row['tanggal_kunjungan'] ?></td>
            <td><?= $row['jumlah_orang'] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
