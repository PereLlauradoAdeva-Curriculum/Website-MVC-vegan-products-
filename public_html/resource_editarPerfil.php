<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h2>Editar perfil</h2>

    <?php
    require __DIR__ . '/Controlador/mostraDadesUser.php';

    // Comprovar si s'han carregat les dades
    if (!isset($dades) || !is_array($dades)) {
        echo "<p>No s'han pogut carregar les dades actuals del perfil.</p>";
        $dades = []; // Per evitar errors més avall
    }
    ?>

    <form action="/Controlador/canviaDadesUser.php" method="post" class="formulari-general" enctype="multipart/form-data">
        <!-- Nom -->
        <label for="nom">Nou nom:</label>
        <input type="text" id="nom" name="nom" pattern="[A-Za-z\s]+" 
               title="Només caràcters i espais" 
               value="<?php echo isset($dades['nom']) ? htmlentities($dades['nom'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        <br><br>

        <!-- Correu electrònic -->
        <label for="email">Nova dreça de correu electrònic:</label>
        <input type="email" id="email" name="email" 
               value="<?php echo isset($dades['e_mail']) ? htmlentities($dades['e_mail'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        <br><br>

        <!-- Password -->
        <label for="password">Nova contrasenya:</label>
        <input type="password" id="password" name="password" pattern="[A-Za-z0-9]+" title="Només caràcters alfanumèrics">
        <br><br>

        <!-- Adreça -->
        <label for="adreca">Nova adreça:</label>
        <input type="text" id="adreca" name="adreca" maxlength="30" 
               title="Fins a 30 caràcters i espais" 
               value="<?php echo isset($dades['adress']) ? htmlentities($dades['adress'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        <br><br>

        <!-- Població -->
        <label for="poblacio">Nova població:</label>
        <input type="text" id="poblacio" name="poblacio" maxlength="30" 
               title="Fins a 30 caràcters i espais" 
               value="<?php echo isset($dades['poblacio']) ? htmlentities($dades['poblacio'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        <br><br>

        <!-- Codi Postal -->
        <label for="codi_postal">Nou codi Postal:</label>
        <input type="text" id="codi_postal" name="codi_postal" pattern="^\d{5}$" 
               title="Exactament 5 dígits" 
               value="<?php echo isset($dades['codi_postal']) ? htmlentities($dades['codi_postal'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        <br><br>

        <!-- Imatge de perfil -->
        <label for="nova_img">Nova imatge de perfil:</label>
        <input type="file" name="profile_image" />
        <br><br>

        <button type="submit">Canviar Dades</button>
    </form>

</body>
</html>
