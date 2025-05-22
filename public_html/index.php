<?php

    session_start();


    // Agafem l'acció de l'usuari 
    $accio = $_GET['accio'] ?? NULL;
    
    // Fem servir el switch per veure les accions.
    switch ($accio) {
        case 'llistar-categories':
            include __DIR__.'/resource_llistar_categories.php';
            break;

        case 'llistar-carn-vegana':
            include __DIR__.'/resource_llistar_carn_vegana.php';
            break;

        case 'llistar-complements-alimentaris':
            include __DIR__.'/resource_llistar_complements_alimentaris.php';
            break;
        
        case 'llistar-productes':
            include __DIR__.'/resource_llistar_productes.php';
            break;
            
        case 'detall-producte':
            // Si es vol accedir als detalls d'un producte específic
            include __DIR__.'/resource_detall_producte.php';
            break;

        case 'registrar-se':
            include __DIR__.'/resource_registre.php';
            break;
        case 'editar-perfil':
            include __DIR__.'/resource_editarPerfil.php';
            break;
        case 'cabas':
            include __DIR__.'/resource_cabas.php';
            break;
        
        case 'iniciar-sessio':
            include __DIR__.'/resource_inici_sessio.php';
            break;

        case 'tancar-sessio':
            include __DIR__.'/resource_tancar_sessio.php';
            break;
        case 'veure-comandes':
            include __DIR__.'/resource_llistar_comandes.php';
            break;
        default:
            // Mostrem la pàgina principal per defecte
            include __DIR__.'/resource_portada.php';
            break;
    }
?>


