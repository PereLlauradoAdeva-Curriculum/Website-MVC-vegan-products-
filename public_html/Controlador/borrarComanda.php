<?php
session_start();

// Eliminar el carret de la sessió
if (isset($_SESSION['carret'])) {
    unset($_SESSION['carret']);
}

// Redirigir a la mateixa pàgina
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
