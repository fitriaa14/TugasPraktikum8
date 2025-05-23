<?php
class Wisata {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM pengunjung";
        return $this->conn->query($query);
    }

    public function add($nama, $tujuan, $tanggal, $jumlah) {
        $stmt = $this->conn->prepare("INSERT INTO pengunjung (nama, tujuan, tanggal_kunjungan, jumlah_orang) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nama, $tujuan, $tanggal, $jumlah);
        return $stmt->execute();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM pengunjung WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function update($id, $nama, $tujuan, $tanggal, $jumlah) {
       $stmt = $this->conn->prepare("UPDATE pengunjung SET nama=?, tujuan=?, tanggal_kunjungan=?, jumlah_orang=? WHERE id=?");
        $stmt->bind_param("sssii", $nama, $tujuan, $tanggal, $jumlah, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM pengunjung WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
