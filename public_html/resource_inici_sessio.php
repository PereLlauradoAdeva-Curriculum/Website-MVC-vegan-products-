<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inici de Sessió</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h2>Inici de Sessió</h2>
    <form action="/Controlador/iniciSessio.php" method="post" class="formulari-general">
        <!-- Correu electrònic -->
        <label for="login_email">Adreça de correu electrònic:</label>
        <input type="email" id="login_email" name="login_email" required>
        <br><br>

        <!-- Password -->
        <label for="login_password">Contrasenya:</label>
        <input type="password" id="login_password" name="login_password" required>
        <br><br>

        <button type="submit">Iniciar Sessió</button>
    </form>

</body>
</html>
