<?php if ($comandes && count($comandes) > 0): ?>
    <ul id="llistat-comandes">
        <?php foreach ($comandes as $comanda): ?>
            <li>
                <h3>Comanda feta el: <?php echo htmlentities($comanda['data'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><strong>Import Total:</strong> <?php echo htmlentities($comanda['preu_total'], ENT_QUOTES, 'UTF-8'); ?> €</p>
                <h4>Productes:</h4>
                <ul>
                    <?php foreach ($comanda['productes'] as $producte): ?>
                        <li>
                            <p><strong>Nom:</strong> <?php echo htmlentities($producte['nom'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p><strong>Quantitat:</strong> <?php echo htmlentities($producte['quantitat'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p><strong>Preu:</strong> <?php echo htmlentities($producte['preu'], ENT_QUOTES, 'UTF-8'); ?> €</p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No s'han trobat comandes registrades.</p>
<?php endif; ?>
