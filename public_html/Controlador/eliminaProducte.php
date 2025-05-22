<?php
// Comprova si la sessió està activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el producte existeix al cabàs
if (isset($_POST['prod_id']) && isset($_SESSION['carret']['productes'][$_POST['prod_id']])) {
    $prod_id = $_POST['prod_id'];

    // Eliminar el producte del cabàs
    unset($_SESSION['carret']['productes'][$prod_id]);

    // Actualitzar el preu total
    $_SESSION['carret']['totalPreu'] = array_reduce($_SESSION['carret']['productes'], function ($total, $producte) {
        return $total + $producte['preuTotal'];
    }, 0);
}

// Redirigir de nou a la pàgina del cabàs
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
