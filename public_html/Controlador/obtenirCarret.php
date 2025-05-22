<?php
session_start();

// Verificar si l'usuari ha iniciat sessió
if (!isset($_SESSION['id'])) {
    echo json_encode(['error' => 'Usuari no ha iniciat sessió.']);
    exit;
}

// Retornar l'estat del carret
if (isset($_SESSION['carret'])) {
    echo json_encode($_SESSION['carret']);
} else {
    echo json_encode([
        'productes' => [],
        'totalPreu' => 0,
    ]);
}
exit;
?>