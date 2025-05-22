<?php

require_once __DIR__.'/../Models/connectDB.php';
require_once __DIR__.'/../Models/consultaDescripcio.php';
session_start();
$producte_id = $_GET['producte_id'];
$conn = getConnection();

if ($conn && $producte_id) {
    $descripcio = consultaDescripcio($conn, $producte_id);
    require __DIR__.'/../Vista/descripcio.php';
} else {
    echo "Error al carregar la descripció.";
}

?>  