<ul class="categories">
    <?php foreach ($categories as $categoria): ?>
        <div class="categoria">
            <a onclick="llistarProductes(<?php echo $categoria['categoria_id']; ?>)">
                <img src="<?php echo $categoria['imatge']; ?>" alt="Carn Vegana">
                <p><?php echo htmlentities($categoria['nom'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></p> 
            </a>
        </div>
    <?php endforeach; ?>
<ul>
