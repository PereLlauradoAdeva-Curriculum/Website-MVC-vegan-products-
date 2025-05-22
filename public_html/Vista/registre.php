<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre Completat</title>
    <link rel="stylesheet" href="/../css/style.css"> <!-- Assegura't que el CSS estigui ben enllaçat -->
</head>
<body>
    <section class="success-message">
        <h2>Registre completat amb èxit!</h2>
        <p>Enhorabona, <span class="user-name"><?php echo htmlspecialchars($_POST['nom']); ?></span>! Ara formes part de <strong>MyVeggie</strong>.</p>
        <a class="primary-button" href="/../index.php">Torna a la pantalla principal</a>
    </section>
</body>
</html>