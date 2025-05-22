<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les teves Comandes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Your Veggie</h1>
        <nav>
            <a href="/index.php">Tornar a la pàgina principal</a>
        </nav>
    </header>
    <main>
        <h2>Les teves Comandes</h2>
        <section> 
        <?php require __DIR__ . '/Controlador/llistarComandes.php'; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Your Veggie</p>
    </footer>
</body>
</html>
