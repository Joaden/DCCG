/**
 * Created by chane on 26/10/2020.
 */
window.onload = () => {
    // Gestion des buttons "Supprimer" attribut "data-delete"
    let links= document.querySelectorAll("[data-delete]")
    //console.log(links)

    // Listen to all lightbox instances
    document.addEventListener('ax.lightbox.open', function() {
        // open event !
    });

// Listen to only one lightbox instance
    let lightboxQuery = document.querySelector('#example-lightbox');
    lightboxQuery.addEventListener('ax.lightbox.open', function() {
        // open event only on #example-lightbox
        let lightbox = new Axentix.Lightbox('#example-lightbox', {
            animationDuration: 500,
            offset: 150,
            mobileOffset: 	80
        });
    });


}