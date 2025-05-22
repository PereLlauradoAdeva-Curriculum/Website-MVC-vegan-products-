<?php

function registre_usuari($conn, $nom, $email, $password, $adreca, $poblacio, $codi_postal) {
    $sql = "INSERT INTO users (nom, e_mail, password, adress, poblacio, codi_postal) VALUES (:nom, :email, :password, :adreca, :poblacio, :codi_postal)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':nom' => $nom,
        ':email' => $email,
        ':password' => password_hash($password, PASSWORD_DEFAULT), // Emmagatzemem la contrasenya encriptada
        ':adreca' => $adreca,
        ':poblacio' => $poblacio,
        ':codi_postal' => $codi_postal,
    ]);
}

?>