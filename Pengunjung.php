<?php
require_once 'koneksi.php';

class Pengunjung extends Koneksi {
    public function tampilkanData() {
        $sql = "SELECT * FROM pengunjung";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>
