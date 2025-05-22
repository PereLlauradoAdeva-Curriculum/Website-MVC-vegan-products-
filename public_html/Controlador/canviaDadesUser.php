<?php
session_start();
require_once __DIR__ . '/../Models/connectDB.php';

if (!isset($_SESSION['id'])) {
    echo "Error: Usuari no autenticat.";
    exit;
}

$conn = getConnection();

// Recollir dades del formulari
$dades = [
    'nom' => isset($_POST['nom']) && $_POST['nom'] !== '' ? $_POST['nom'] : null,
    'email' => isset($_POST['email']) && $_POST['email'] !== '' ? $_POST['email'] : null,
    'password' => isset($_POST['password']) && $_POST['password'] !== '' ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null,
    'adreca' => isset($_POST['adreca']) && $_POST['adreca'] !== '' ? $_POST['adreca'] : null,
    'poblacio' => isset($_POST['poblacio']) && $_POST['poblacio'] !== '' ? $_POST['poblacio'] : null,
    'codi_postal' => isset($_POST['codi_postal']) && $_POST['codi_postal'] !== '' ? $_POST['codi_postal'] : null,
    'profile_image' => isset($_FILES['profile_image']) && !empty($_FILES['profile_image']) !== '' ? $_FILES['profile_image'] : null

];

// Consulta SQL amb COALESCE per mantenir els valors existents
$sql = "UPDATE users SET 
            nom = COALESCE(:nom, nom), 
            e_mail = COALESCE(:email, e_mail), 
            password = COALESCE(:password, password), 
            adress = COALESCE(:adreca, adress), 
            poblacio = COALESCE(:poblacio, poblacio), 
            codi_postal = COALESCE(:codi_postal, codi_postal)
            
        WHERE user_id = :id";

$stmt = $conn->prepare($sql);

// Assignar valors als paràmetres
$stmt->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
$stmt->bindValue(':nom', $dades['nom'], PDO::PARAM_STR);
$stmt->bindValue(':email', $dades['email'], PDO::PARAM_STR);
$stmt->bindValue(':password', $dades['password'], PDO::PARAM_STR);
$stmt->bindValue(':adreca', $dades['adreca'], PDO::PARAM_STR);
$stmt->bindValue(':poblacio', $dades['poblacio'], PDO::PARAM_STR);
$stmt->bindValue(':codi_postal', $dades['codi_postal'], PDO::PARAM_STR);

// Executar la consulta
if ($stmt->execute()) {
    //echo "Les dades del perfil s'han actualitzat correctament.";
    require __DIR__.'/../Vista/canvi_correcte.php';
    exit;
} else {
    echo "Error en actualitzar les dades del perfil.";
}
?>
