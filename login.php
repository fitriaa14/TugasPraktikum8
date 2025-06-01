<?php
session_start();
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) == 1) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];

        if ($data['level'] == 0) {
            header("Location: halaman_admin.php");
        } else if ($data['level'] == 1) {
            header("Location: halaman_user.php");
        }
        exit();
    } else {
        echo "<script>alert('Login gagal!');window.location='login.php';</script>";
    }
}
?>

<!-- HTML Form -->
<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
