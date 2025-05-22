<?php
class Database {
    private $host = "deic-docencia.uab.cat";
    private $db_name = "tdiw-g2";
    private $username = "tdiw-g2";
    private $password = "marpe14";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>