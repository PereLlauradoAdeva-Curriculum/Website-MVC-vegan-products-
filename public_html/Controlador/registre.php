<?php
    require_once __DIR__.'/../Models/connectDB.php';
    require_once __DIR__.'/../Models/afageixRegistre.php';

    $conn = getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = [];
        $nom = trim($_POST['nom']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $adreca = trim($_POST['adreca']);
        $poblacio = trim($_POST['poblacio']);
        $codi_postal = trim($_POST['codi_postal']);
        //$imatge = trim($_POST['img_perfil']);
        if (empty($nom)) {
            $errors[] = "El nom es obligatori.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "El correu electrònic no és vàlid.";
        }
        if (!ctype_alnum($password)) {
            $errors[] = "La contrasenya només pot contenir caràcters alfanumèrics.";
        }
        if (empty($adreca)) {
            $errors[] = "L'adreça és obligatòria.";
        }
        if (empty($poblacio)) {
            $errors[] = "La població és obligatòria.";
        }
        if (!preg_match('/^\d{5}$/', $codi_postal)) {
            $errors[] = "El codi postal ha de ser un número de 5 dígits.";
        }

        if (empty($errors)) {
            // Cridem la funció de registre
        registre_usuari($conn, $nom, $email, $password, $adreca, $poblacio, $codi_postal);
        require __DIR__.'/../Vista/registre.php';
        }else {
            // Mostrem els errors
            foreach ($errors as $error) {
                echo "<p>Error: $error</p>";
            }
        }
    }

    
?>