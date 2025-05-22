<?php

function consultaDescripcio($conn, $producte_id = null) {
    $sql = "SELECT * FROM productes WHERE prod_id = :producte";
    $stmt = $conn->prepare($sql);
    if ($producte_id) {
        $stmt->bindParam(':producte', $producte_id, PDO::PARAM_STR);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>