window.onload = () => {

    // Listen to all caroulix instances
    document.addEventListener('ax.caroulix.slide', function() {
        // slide event !
    });

    // Listen to only one caroulix instance
    let caroulixQuery = document.querySelector('#example-caroulix');
    caroulixQuery.addEventListener('ax.caroulix.slide', function() {
        // slide event only on #example-caroulix

    //        let caroulix = new Axentix.Caroulix('#example-caroulix');
        // With options
        let caroulix = new Axentix.Caroulix('#example-caroulix', {
            animationDuration: 600,
            indicators: {
                enabled: true,
                isFlat: true
            }
        });
        // Syntax : caroulix.{method}
        caroulix.next();

    });


}














