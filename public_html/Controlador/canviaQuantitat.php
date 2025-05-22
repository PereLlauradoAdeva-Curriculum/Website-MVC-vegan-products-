<?php
// Comprova si la sessió està activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el producte i la quantitat estan definits
if (isset($_POST['prod_id'], $_POST['quantitat']) && is_numeric($_POST['quantitat']) && $_POST['quantitat'] > 0) {
    $prod_id = $_POST['prod_id'];
    $nova_quantitat = (int) $_POST['quantitat'];

    // Verificar si el producte existeix al cabàs
    if (isset($_SESSION['carret']['productes'][$prod_id])) {
        // Calcular el preu unitari basant-se en el preu total i la quantitat actuals
        $quantitat_actual = $_SESSION['carret']['productes'][$prod_id]['quantitat'];
        $preuTotal_actual = $_SESSION['carret']['productes'][$prod_id]['preuTotal'];
        $preuUnitari = $quantitat_actual > 0 ? $preuTotal_actual / $quantitat_actual : 0;

        // Depuració per comprovar el càlcul del preu unitari
        //error_log("Preu unitari calculat per al producte $prod_id: $preuUnitari");

        // Actualitzar la quantitat i el preu total del producte
        $_SESSION['carret']['productes'][$prod_id]['quantitat'] = $nova_quantitat;
        $_SESSION['carret']['productes'][$prod_id]['preuTotal'] = $preuUnitari * $nova_quantitat;

        // Recalcular el preu total del cabàs
        $_SESSION['carret']['totalPreu'] = array_reduce($_SESSION['carret']['productes'], function ($total, $producte) {
            return $total + $producte['preuTotal'];
        }, 0);

        // Depuració per verificar l'estat del carret després de l'actualització
        //error_log("Carret actualitzat: " . print_r($_SESSION['carret'], true));
    } else {
        error_log("Error: El producte amb ID $prod_id no existeix al cabàs");
    }
} else {
    error_log("Error: Dades no vàlides rebudes al formulari");
}

// Redirigir de nou a la pàgina del cabàs
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
