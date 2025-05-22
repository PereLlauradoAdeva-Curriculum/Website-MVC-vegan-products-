<?php
function comprova_usuari($conn, $email, $password) {
    // Comprovem que els valors no són buits
    if (empty($email) || empty($password)) {
        echo "Error: L'email o la contrasenya no poden estar buits.";
        return;
    }

    try {
        // Preparem la consulta per evitar SQL Injection
        $query = "SELECT password, user_id  FROM users WHERE e_mail = :email";
        $stmt = $conn->prepare($query);

        // Associem els paràmetres i executem la consulta
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Comprovem si la contrasenya és correcta
            if (password_verify($password, $row['password'])) {
                $_SESSION['id'] = $row['user_id'];
                require __DIR__.'/../Vista/inici_correcte.php';

                
                // Aquí pots redirigir l'usuari o establir una sessió
            } else {
                echo "Error: Contrasenya incorrecta.";
            }
        } else {
            echo "Error: No s'ha trobat cap usuari amb aquest email.";
        }
    } catch (PDOException $e) {
        echo "Error: No s'ha pogut realitzar l'operació. " . $e->getMessage();
    }
}
?>
