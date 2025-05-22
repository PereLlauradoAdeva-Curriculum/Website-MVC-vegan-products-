<?php
    require_once __DIR__.'/../Models/connectDB.php';
    require_once __DIR__.'/../Models/comprovaUsuari.php';

    session_start();

    $conn = getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['login_email'];
        $password = $_POST['login_password'];

        comprova_usuari($conn, $email, $password);
    }

?>