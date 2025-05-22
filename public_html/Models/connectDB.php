<?php

function getConnection() {
    $host = "localhost";
    $db_name = "tdiw-g2"; // Nom BD
    $username = "tdiw-g2"; // User
    $password = "marpe14"; // Contra

    try {
        $conn = new PDO("pgsql:host=$host; port=5432; dbname=$db_name", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $exception) {
        echo "Error de conexión: " . $exception->getMessage();
        return null;
    }
}
?>