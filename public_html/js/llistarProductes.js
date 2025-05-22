function llistarProductes(id) {

    fetch("/Controlador/productes.php?categoria_id=" + id)
    .then(response => {
        if(!response.ok){

        throw new Error('Error de carrega de Fetch');

        }
        return response.text();
        
    }).then(
        response=>{

            document.getElementById("productes").innerHTML = response;    

            
        }
    )
    
}


