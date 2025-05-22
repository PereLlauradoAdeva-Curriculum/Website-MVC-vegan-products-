<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tancar Sessió</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <h2>Tancar sessió</h2>

    <p>Estas segur que vols tancar la teva sessió? Perdràs el teu carret de la compra i no podràs visualitzar informació sobre les teves comandes. Però estigues tranquil, sempre pots recuperar la teva sessió!</p>

    <div class="opcions-tancar-sessio">
        <!-- Botó per confirmar tancament de sessió -->
        <form action="/Controlador/tancarSessio.php" method="POST">
            <button type="submit" class="btn-confirmar">Sí, vull tancar la sessió</button>
        </form>
        
        <!-- Botó per tornar a la pàgina principal -->
        <a href="/index.php" class="btn-cancelar">Tornar a la pàgina principal</a>
    </div>

</body>
</html>
