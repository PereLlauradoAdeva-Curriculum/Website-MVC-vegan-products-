$(document).ready(function () {
    const isLoggedIn = false; // Substitueix-ho amb la lògica real de sessió (AJAX o PHP)

    function renderDropdownMenu() {
        const dropdownMenu = $('.dropdown-menu ul');
        dropdownMenu.empty(); // Neteja les opcions actuals

        if (document.getElementsByClassName('dropdown-menu')[0].getAttribute('user-id') == "1") {
            //dropdownMenu.append('<li><a href="index.php?accio=meu-compte">El meu compte</a></li>');
            dropdownMenu.append('<li><a href="index.php?accio=veure-comandes">Les meves compres</a></li>');
            dropdownMenu.append('<li><a href="index.php?accio=editar-perfil">Editar Perfil</a></li>');
            dropdownMenu.append('<li><a href="index.php?accio=tancar-sessio">Tanca sessió</a></li>');
            
        } else {
            dropdownMenu.append('<li><a href="index.php?accio=iniciar-sessio">Iniciar sessió</a></li>');
        }
    } 

    // Inicialitza el menú ocult
    $('.dropdown-menu').hide();

    // Acció quan es fa clic a la icona d'usuari
    $('.user-icon').on('click', function (event) {
        event.stopPropagation(); // Evita la propagació del clic
        renderDropdownMenu(); // Genera les opcions del menú
        $('.dropdown-menu').toggle(); // Mostra o amaga el menú
    });

    // Amaga el menú si es fa clic fora
    $(document).on('click', function (event) {
        if (!$(event.target).closest('.user-menu').length) {
            $('.dropdown-menu').hide();
        }
    });
});
