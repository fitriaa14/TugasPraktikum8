<?php
session_start();
require 'koneksi.php';
include 'classes/Wisata.php';

$mysqli = new mysqli("localhost", "root", "", "db_wisataa");
$wisata = new Wisata($mysqli);
$data = $wisata->getAll();

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

// Proses Login
if (!isset($_SESSION['level']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = md5($_POST["password"]);

    $query = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query) == 1) {
        $data_user = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $data_user['username'];
        $_SESSION['level'] = $data_user['level'];
    } else {
        $error = "Login gagal! Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Multi Level</title>
    <link rel="stylesheet" href="css/style.css?v=1.4">
</head>
<body>

<?php if (!isset($_SESSION['level'])): ?>
    <!-- FORM LOGIN -->
    <div class="login-box">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>

<?php elseif ($_SESSION['level'] == 0): ?>
    <!-- HALAMAN ADMIN -->
    <div class="admin-box">
        <h2>Selamat Datang Admin, <?= $_SESSION['username'] ?></h2>
        <p>Ini adalah halaman admin.</p>
        <a href="index.php?logout=1" class="logout">Logout</a>
    </div>

<?php elseif ($_SESSION['level'] == 1): ?>
    <!-- HALAMAN USER -->
    <h2>Data Pengunjung Wisata</h2>

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
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['tujuan']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_kunjungan']) ?></td>
                    <td><?= htmlspecialchars($row['jumlah_orang']) ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row['id'] ?>" class="btn-edit">Ubah</a>
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Yakin ingin hapus data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <!-- Tombol logout dan tambah data sejajar -->
        <div class="action-buttons">
            <a href="index.php?logout=1" class="logout">Logout</a>
            <a href="tambah.php" class="btn-float">Tambah Data</a>
        </div>
    </div>
<?php endif; ?>

<script src="js/script.js"></script>
</body>
</html>
