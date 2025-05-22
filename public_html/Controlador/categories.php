<?php
    //amb el require once agafem totes les línies de codi i les incrustem alla.
    require_once __DIR__.'/../Models/connectDB.php';
    require_once __DIR__.'/../Models/consultaClasses.php';
    session_start();
    $conn = getConnection();
    if($conn)
    {

        $categories = consultaClasses($conn);
        require __DIR__.'/../Vista/categories.php';
    }else{
        echo "No s'ha establert connexió amb la BD";
    }
?>
