<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__.'/../Models/connectDB.php';
require_once __DIR__.'/../Models/llistaComandes.php';

// Verificar si l'usuari ha iniciat sessió
if (!isset($_SESSION['id'])) {
    echo "<p>Error: Usuari no ha iniciat sessió.</p>";
    exit;
}

$conn = getConnection();
$usuariId = $_SESSION['id'];

// Obtenir les comandes
$comandes = obtenirComandes($conn, $usuariId);

// Passar les dades a la vista
require __DIR__.'/../Vista/llistarComandes.php';
?>
