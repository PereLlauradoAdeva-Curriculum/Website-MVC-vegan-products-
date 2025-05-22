<?php

function consultaClasses($conn){

    $sql = "SELECT * FROM categories";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultats;
}

?>