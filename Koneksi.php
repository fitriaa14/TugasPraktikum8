<?php
class Koneksi {
    public $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "db_wisata");

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }
}
?>
