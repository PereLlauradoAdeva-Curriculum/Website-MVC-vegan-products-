<ul class="productes">
    <?php foreach ($productes as $producte): ?>
        <div class="producte" id="producte-<?php echo $producte['prod_id']; ?>">
            <a onclick="mostraDescripcio(<?php echo $producte['prod_id']; ?>)">
                <img src="<?php echo $producte['imatge']; ?>" alt="Carn Vegana">
                <p><?php echo $producte['nom']; ?></p>
                <p><?php echo $producte['preu']; ?> €</p>
            </a>
            <p>Tria la quantitat de productes:</p>
            <input type="number" id="quantitat-<?php echo $producte['prod_id']; ?>" min="1" value="1">
            <br><br>
            
            <button 
                class="btn-afegir-carret"
                onclick="afegirAlCarret('<?php echo $producte['prod_id']; ?>', '<?php echo $producte['nom']; ?>', '<?php echo $producte['preu']; ?>')">
                Afegir al Carret
            </button>
        </div>
    <?php endforeach; ?>
</ul>
