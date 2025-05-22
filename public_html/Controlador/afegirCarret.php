<?php
session_start();

// Inicialitzar el carret si no existeix
if (!isset($_SESSION['carret'])) {
    $_SESSION['carret'] = [
        'productes' => [],
        'totalPreu' => 0,
    ];
}

// Verificar si l'usuari ha iniciat sessió
if (!isset($_SESSION['id'])) {
    echo json_encode(['error' => 'Has d\'iniciar sessió per omplir el carret.']);
    exit;
}

// Recollir dades del producte
$prod_id = $_POST['prod_id'];
$nom = $_POST['nom'];
$preu = floatval($_POST['preu']);
$quantitat = intval($_POST['quantitat']) ?: 1; // Assegurar que la quantitat és vàlida

// Afegir el producte al carret
if (isset($_SESSION['carret']['productes'][$prod_id])) {
    $_SESSION['carret']['productes'][$prod_id]['quantitat'] += $quantitat;
    $_SESSION['carret']['productes'][$prod_id]['preuTotal'] += $preu * $quantitat;
} else {
    $_SESSION['carret']['productes'][$prod_id] = [
        'nom' => $nom,
        'quantitat' => $quantitat, 
        'preuTotal' => $preu * $quantitat,
    ];
}

// Actualitzar el preu total del carret
$_SESSION['carret']['totalPreu'] += $preu * $quantitat;

// Retornar l'estat del carret
echo json_encode($_SESSION['carret']);
exit;

?>


// 