<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/user_menu.js" defer></script>
    <script src="/js/llistarProductes.js" defer></script>
    <script src="/js/mostraDescripcio.js" defer></script>
    <script src="/js/controlCarret.js" defer></script>
    <script src="/js/scroll.js" defer> </script>
    <title>Botiga - Categories</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <h1>Your Veggie</h1>
        <div class="user-options">
            <a href="index.php?accio=cabas" class="register">Veure el cabàs</a>
            <a href="index.php?accio=registrar-se" class="register">Registrar-se</a>
        <div class="user-menu">
            <span class="user-icon">&#128100;</span>
            <div class="dropdown-menu" user-id="<?php echo isset($_SESSION['id']) ? '1' : '0'; ?>">
                <ul></ul>
            </div>
        </div>
    </div>
    </header>

    <main>
        <section class="categories">
            <?php require __DIR__ . '/Controlador/categories.php'; ?>
            <a href="/index.php"></a>
        </section>

        <section id="productes">
            <!-- Els productes es llistaran dinàmicament amb JavaScript -->
        </section>

        <section id="descripcio">
            <!-- Aquí es mostrarà la descripció d'un producte seleccionat -->
        </section>
    </main>

    <div id="carret" class="carret-visible">
        <h2>El teu Carret</h2>
    </div>


    <footer>
    <p>&copy; 2024 La Meva Botiga</p>
    </footer>
</body>
</html>
