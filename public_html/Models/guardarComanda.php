<?php
function guardarComanda($conn) {
    try {
        // Comprovar que l'usuari ha iniciat sessió i que hi ha productes al carret
        if (!isset($_SESSION['id'])) {
            throw new Exception("L'usuari no ha iniciat sessió.");
        }
        if (empty($_SESSION['carret']['productes'])) {
            throw new Exception("El carret està buit.");
        }

        // Dades del carret i usuari
        $usuariId = $_SESSION['id'];
        $productes = $_SESSION['carret']['productes'];
        $preuTotal = $_SESSION['carret']['totalPreu'];
        $data = date("Y-m-d");

        // Inserir la comanda principal
        $stmtComanda = $conn->prepare("INSERT INTO comandes (user_id, preu_total, data_compra) VALUES (:user_id, :preu_total, :data_compra)");
        $stmtComanda->bindValue(':user_id', $usuariId, PDO::PARAM_INT);
        $stmtComanda->bindValue(':preu_total', $preuTotal, PDO::PARAM_STR);
        $stmtComanda->bindValue(':data_compra', $data, PDO::PARAM_STR);
        $stmtComanda->execute();

        // Obtenir l'ID de la comanda creada
        $comandaId = $conn->lastInsertId();

        // Inserir els productes de la comanda
        $stmtProducte = $conn->prepare("INSERT INTO productes_comanda (comand_id, prod_id, quantitat, preu_total, nom) VALUES (:comand_id, :prod_id, :quantitat, :preu_total, :nom)");

        foreach ($productes as $prod_id => $producte) {
            // Associar els valors per a cada producte
            $stmtProducte->bindValue(':comand_id', $comandaId, PDO::PARAM_INT);
            $stmtProducte->bindValue(':prod_id', $prod_id, PDO::PARAM_INT);
            $stmtProducte->bindValue(':quantitat', $producte['quantitat'], PDO::PARAM_INT);
            $stmtProducte->bindValue(':preu_total', $producte['preuTotal'], PDO::PARAM_STR);
            $stmtProducte->bindValue(':nom', $producte['nom'], PDO::PARAM_STR);

            // Executar la inserció
            $stmtProducte->execute();

            // IMPORTANT: Restablir els valors del statement per a la següent iteració
            $stmtProducte->closeCursor();
        }

        // Netejar el carret després de guardar la comanda
        $_SESSION['carret'] = [
            'productes' => [],
            'totalPreu' => 0,
        ];

        return $comandaId;

    } catch (PDOException $e) {
        // Gestionar errors de la base de dades
        error_log("Error al guardar la comanda: " . $e->getMessage());
        return false;
    } catch (Exception $e) {
        // Gestionar altres errors
        error_log("Error: " . $e->getMessage());
        return false;
    }
}
?>
