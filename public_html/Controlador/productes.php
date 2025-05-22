<?php
    require_once __DIR__.'/../Models/connectDB.php';
    require_once __DIR__.'/../Models/consultaProductes.php';
    // Extreiem la categoria del nom de l'URL
    $categoria_id = $_GET['categoria_id'];
    //echo($categoria)
    $conn = getConnection();
    session_start();
    if($conn) {
        // Cridem a la funció amb la categoria extreta
        $productes = consultaProductes($conn, $categoria_id);

        // Carreguem la vista amb els productes filtrats
        require __DIR__.'/../Vista/productes.php';
    } else {
        echo "No s'ha establert connexió amb la BD";
    }
?>

