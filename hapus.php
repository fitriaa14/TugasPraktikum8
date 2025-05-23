<?php
include 'classes/Wisata.php';
$mysqli = new mysqli("localhost", "root", "", "db_wisataa");
$wisata = new Wisata($mysqli);

if (isset($_GET['id'])) {
    $wisata->delete($_GET['id']);
    header("Location: index.php");
}
?>
