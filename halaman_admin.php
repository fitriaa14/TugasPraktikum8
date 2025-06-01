<?php
session_start();
if (!isset($_SESSION['level']) || $_SESSION['level'] != 0) {
    header("Location: index.php");
    exit();
}
echo "<h2>Selamat Datang, Admin " . $_SESSION['username'] . "</h2>";
?>
<a href="logout.php">Logout</a>
