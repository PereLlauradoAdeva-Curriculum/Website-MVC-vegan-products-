/*function mostraDescripcio(id) {
    // Fem una petició al controlador per obtenir la descripció
    fetch("/Controlador/descripcio.php?producte_id=" + id)
    .then(response => {
        if (!response.ok) {
            throw new Error("No s'ha pogut carregar la descripció.");
        }
        return response.text();
    })
    .then(response => {
        document.getElementById("producte-"+id).innerHTML += response; //Canviar descripcio per productes
    });
}*/
function mostraDescripcio(id) {
    const producteElement = document.getElementById("producte-" + id);

    // Comprovar si ja hi ha una descripció visible
    const descripcioElement = producteElement.querySelector(".descripcio");

    if (!descripcioElement) {
        // Si no hi ha descripció, la carreguem
        fetch("/Controlador/descripcio.php?producte_id=" + id)
            .then(response => {
                if (!response.ok) {
                    throw new Error("No s'ha pogut carregar la descripció.");
                }
                return response.text();
            })
            .then(response => {
                // Crear un nou element per a la descripció
                const novaDescripcio = document.createElement("div");
                novaDescripcio.className = "descripcio"; // Assignar una classe per identificar-la
                novaDescripcio.innerHTML = response;

                // Afegir la descripció al producte
                producteElement.appendChild(novaDescripcio);
            })
            .catch(error => {
                console.error(error.message);
            });
    }
}


