<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productes - Categoria</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Productes - Carn Vegana</h1>
        <nav><a href="index.html">Tornar a categories</a></nav>
    </header>

    <section class="productes">
        <?php require __DIR__.'/Controlador/productes.php'; ?>
    </section>

    <footer>
        <p>&copy; 2024 La Meva Botiga</p>
    </footer>
</body>
</html>
