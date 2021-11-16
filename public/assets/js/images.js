window.onload = () => {
    // Gestion des buttons "Supprimer" attribut "data-delete"
    let links= document.querySelectorAll("[data-delete]")
    //console.log(links)

    // On boucle les links
    for(link of links){
        // On ecoute le clic
        link.addEventListener("click", function(e){
            //On empeche le click de se propager
            e.preventDefault();

            //On demande confirmation
            if(confirm("Voulez-vous supprimer l'image ?")){
                // On envoie une requete AJAX vers le href du lien avec la méthode delete
                fetch(this.getAttribute("href"), {
                    method: "DELETE",
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({"_token": this.dataset.token})
                }).then(
                    // On recupere la reponse en JSON
                    response => response.json()
                ).then(data => {
                    if(data.success)
                        this.parentElement.remove()
                    else
                        alert(data.error)
                    }).catch(e => alert(e))
            }
        })
    }
}