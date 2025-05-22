<?php

function mostraDadesUser($conn, $usuariId) {
    try {
        // Preparar la consulta per obtenir les dades de l'usuari, incloent la ruta de la imatge
        $stmt = $conn->prepare("SELECT nom, e_mail, adress, poblacio, codi_postal FROM users WHERE user_id = :id");
        $stmt->bindValue(':id', $usuariId, PDO::PARAM_INT);
        $stmt->execute();

        // Retornar les dades de l'usuari com un array associatiu
        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        // Registra l'error i retorna false
        error_log("Error en mostraDadesUser: " . $e->getMessage());
        return false;
    }
}
?>
