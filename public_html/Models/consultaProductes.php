<?php

function consultaProductes($conn, $categoria_id = null) {
    $sql = "SELECT * FROM productes WHERE categoria_id = :categoria";
    $stmt = $conn->prepare($sql);
    if ($categoria_id) {
        $stmt->bindParam(':categoria', $categoria_id, PDO::PARAM_STR);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>