<?php
function obtenirComandes($conn, $usuariId) {
    try {
        // Obtenir les comandes i els productes associats
        $stmt = $conn->prepare("
            SELECT c.comand_id, c.data_compra, c.preu_total, 
                   pc.nom, pc.quantitat, pc.preu_total AS preu_producte
            FROM comandes c
            INNER JOIN productes_comanda pc ON c.comand_id = pc.comand_id
            WHERE c.user_id = :usuariId
            ORDER BY c.data_compra DESC
        ");
        $stmt->bindValue(':usuariId', $usuariId, PDO::PARAM_INT);
        $stmt->execute();
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Agrupar els resultats per comanda
        $comandes = [];
        foreach ($resultats as $fila) {
            $comandaId = $fila['comand_id'];

            if (!isset($comandes[$comandaId])) {
                $comandes[$comandaId] = [
                    'data' => $fila['data_compra'],
                    'preu_total' => $fila['preu_total'],
                    'productes' => []
                ];
            }

            $comandes[$comandaId]['productes'][] = [
                'nom' => $fila['nom'],
                'quantitat' => $fila['quantitat'],
                'preu' => $fila['preu_producte']
            ];
        }

        return array_values($comandes);

    } catch (PDOException $e) {
        error_log("Error al carregar les comandes: " . $e->getMessage());
        return false;
    }
}

?>