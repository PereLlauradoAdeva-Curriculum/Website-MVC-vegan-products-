<?php
session_start();

// Eliminar totes les dades de la sessió
session_unset();
session_destroy();

// Redirigir a la pàgina principal
header("Location: /index.php");
exit;
?>
