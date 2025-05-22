<?php
    //amb el require once agafem totes les línies de codi i les incrustem alla.
    require_once __DIR__.'/../Models/connectDB.php';
    require_once __DIR__.'/../Models/guardarComanda.php';
    session_start();
    $conn = getConnection();
    if($conn)
    {
        if (isset($_SESSION['carret']) && !empty($_SESSION['carret']['productes'])){
            $usuariId = $_SESSION['id'];
            $productes = $_SESSION['carret']['productes'];
            $preuTotal = $_SESSION['carret']['totalPreu'];
            $data = date("d-m-Y H:i:s");
            guardarComanda($conn, $usuariId, $productes, $preuTotal, $data);

            unset($_SESSION['carret']);

            require __DIR__.'/../Vista/compra_correcte.php';

        }
        else{
            header("Location: /../resource_cabas.php");
        }
    }else{
        echo "No s'ha establert connexió amb la BD";
    }
?>