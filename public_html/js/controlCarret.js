document.addEventListener('DOMContentLoaded', function () {
    console.log('JavaScript carregat correctament');

    // Funció per afegir productes al carret amb una quantitat específica
    window.afegirAlCarret = function (prodId, nom, preu) {
        const quantitatInput = document.getElementById(`quantitat-${prodId}`);
        const quantitat = parseInt(quantitatInput.value) || 1; // Assegurar que és un número vàlid
        console.log(`Afegint ${quantitat} unitats del producte: ID=${prodId}, Nom=${nom}, Preu=${preu}`);

        // Fer una petició al servidor per actualitzar la sessió
        fetch('/Controlador/afegirCarret.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                prod_id: prodId,
                nom: nom,
                preu: preu,
                quantitat: quantitat,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                mostrarMissatgeError(data.error);
            } else {
                actualitzarCarret(data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    };

    

    // Funció per mostrar el missatge d'error
    function mostrarMissatgeError(missatge) {
        const carret = document.getElementById('carret');
        carret.innerHTML = `<div class="missatge-avis">${missatge}</div>`;
    }

    // Funció per actualitzar el carret visualment
    function actualitzarCarret(carretData) {
        const carret = document.getElementById('carret');
        carret.innerHTML = ''; // Buidem el carret abans d'actualitzar

        // Obtenim el nombre de productes i el preu total
        const nombreProductes = carretData.productes ? Object.values(carretData.productes).reduce((total, producte) => total + producte.quantitat, 0) : 0;
        const preuTotal = carretData.totalPreu ? carretData.totalPreu.toFixed(2) : "0.00";

        // Crear un títol per a la secció
        const carretTitle = document.createElement('h2');
        carretTitle.textContent = 'El teu carret';

        // Crear la línia amb la informació
        const carretInfo = document.createElement('p');
        carretInfo.textContent = `Nombre de productes: ${nombreProductes} - Preu Total: ${preuTotal} €`;

        // Afegir el títol i la informació al carret
        carret.appendChild(carretTitle);
        carret.appendChild(carretInfo);
    }

    // Carregar l'estat del carret al carregar la pàgina
    function carregarCarret() {
        fetch('/Controlador/obtenirCarret.php')
            .then(response => response.json())
            .then(data => {
                if (!data.error) {
                    actualitzarCarret(data);
                }
            })
            .catch(error => {
                console.error('Error carregant el carret:', error);
            });
    }

    carregarCarret(); // Carregar el carret inicialment
});


