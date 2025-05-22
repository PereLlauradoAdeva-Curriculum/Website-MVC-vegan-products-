<div class="descripcio">
    <p>
    <?php 
        if (!empty($descripcio) && isset($descripcio[0]['descripcio'])) {
            echo htmlspecialchars($descripcio[0]['descripcio'], ENT_QUOTES, 'UTF-8');
        } else {
            echo "Descripció no disponible.";
        }
        ?>
    </p>
</div>
