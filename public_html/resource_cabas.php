<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veure Cabàs</title>
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
        <h2>El teu Carret</h2>
        
        <ul id="carret-productes">
            <?php if (isset($_SESSION['carret']) && !empty($_SESSION['carret']['productes'])): ?>
                <?php foreach ($_SESSION['carret']['productes'] as $prod_id => $producte): ?>
                    <li>
                        <p><strong>Producte:</strong> <?php echo htmlentities($producte['nom'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Quantitat:</strong> <?php echo $producte['quantitat']; ?></p>
                        <p><strong>Preu:</strong> <?php echo $producte['preuTotal']; ?> €</p>

                        <!-- Formulari per canviar la quantitat -->
                        <form action="Controlador/canviaQuantitat.php" method="POST" style="margin-top: 10px;">
                            <input type="hidden" name="prod_id" value="<?php echo $prod_id; ?>">
                            <label for="quantitat_<?php echo $prod_id; ?>">Canvia Quantitat:</label>
                            <input type="number" id="quantitat_<?php echo $prod_id; ?>" name="quantitat" value="<?php echo $producte['quantitat']; ?>" min="1">
                            <button type="submit">Actualitza</button>
                        </form>

                        <!-- Botó per eliminar el producte -->
                        <form action="Controlador/eliminaProducte.php" method="POST" style="margin-top: 10px;">
                            <input type="hidden" name="prod_id" value="<?php echo $prod_id; ?>">
                            <button type="submit" style="background-color: red; color: white;">Eliminar Producte</button>
                        </form>
                    </li>
                <?php endforeach; ?>

                <li>
                    <p><strong>Preu Total:</strong> <?php echo $_SESSION['carret']['totalPreu']; ?> €</p>
                </li>
            <?php else: ?>
                <li>El carret està buit.</li>
            <?php endif; ?>
        </ul>

        <form action="Controlador/confirmarComanda.php" method="POST">
            <button type="submit">Confirmar Compra</button>
        </form>

        <!-- Formulari per borrar la comanda -->
        <form action="Controlador/borrarComanda.php" method="POST" style="margin-top: 20px;">
            <button type="submit" style="background-color: red; color: white;">Borrar Comanda</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Your Veggie</p>
    </footer>
</body>
</html>
