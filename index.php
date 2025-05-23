<?php
include 'classes/Wisata.php';
$mysqli = new mysqli("localhost", "root", "", "db_wisataa");
$wisata = new Wisata($mysqli);
$data = $wisata->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pengunjung Wisata</title>
    <link rel="stylesheet" href="css/style.css?v=1.1">
</head>
<body>
<<h2>Data Pengunjung Wisata</h2>

<div class="table-wrapper">
    <table>
        <tr>
            <th>Nama</th>
            <th>Tujuan</th>
            <th>Tanggal Kunjungan</th>
            <th>Jumlah Orang</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $data->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['tujuan'] ?></td>
                <td><?= $row['tanggal_kunjungan'] ?></td>
                <td><?= $row['jumlah_orang'] ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row['id'] ?>" class="btn-edit">Ubah</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirmHapus();">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>


    <a href="tambah.php" class="btn btn-float">Tambah Data</a>
</div>

<script src="js/script.js"></script>
</body>
</html>
