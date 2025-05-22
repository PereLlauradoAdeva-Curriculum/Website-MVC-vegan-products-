<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre d'Usuari</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>  

    <h2>Registre d'Usuari</h2>
    <form action="/Controlador/registre.php"  method="post" class="formulari-general">
        <!-- Nom -->
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required pattern="[A-Za-z\s]+" title="Només caràcters i espais">
        <br><br>

        <!-- Correu electrònic -->
        <label for="email">Adreça de correu electrònic:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <!-- Password -->
        <label for="password">Contrasenya:</label>
        <input type="password" id="password" name="password" required pattern="[A-Za-z0-9]+" title="Només caràcters alfanumèrics">
        <br><br>

        <!-- Adreça -->
        <label for="adreca">Adreça:</label>
        <input type="text" id="adreca" name="adreca" maxlength="30" title="Fins a 30 caràcters i espais">
        <br><br>

        <!-- Població -->
        <label for="poblacio">Població:</label>
        <input type="text" id="poblacio" name="poblacio" maxlength="30" title="Fins a 30 caràcters i espais">
        <br><br>

        <!-- Codi Postal -->
        <label for="codi_postal">Codi Postal:</label>
        <input type="text" id="codi_postal" name="codi_postal" required pattern="^\d{5}$" title="Exactament 5 dígits">
        <br><br>

        <label for="img_perfil">Imatge de perfil:</label>
        <input type="file" name="img_perfil" />
        <br><br>

        <button type="submit">Registrar-se</button>
    </form>

</body>
</html>
