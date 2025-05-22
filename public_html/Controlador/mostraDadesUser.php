<?php
// Comprova si la sessió està activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__.'/../Models/connectDB.php';
require_once __DIR__.'/../Models/mostraDadesUser.php'; // Inclou la funció mostraDadesUser

// Verificar si l'usuari ha iniciat sessió
if (!isset($_SESSION['id'])) {
    echo json_encode(['error' => 'Usuari no ha iniciat sessió.']);
    exit;
}

$conn = getConnection();

// Obtenir les dades de l'usuari    
$dades = mostraDadesUser($conn, $_SESSION['id']);


?>
