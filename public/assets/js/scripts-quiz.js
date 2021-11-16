class Question {
    constructor(text, choices, answer) {
        this.text = text;
        this.text = choices;
        this.text = answer;
    }
    isCorrectAnswer(choice) {
        return this.answer === choice;
    }
}
let questions = [
    
]


// (function($) {
//     "use strict"; // Start of use strict

//     // Closes the sidebar menu
//     $(".menu-toggle").click(function (e) {
//         e.preventDefault();
//         $("#sidebar-wrapper").toggleClass("active");
//         $(".menu-toggle > .fa-bars, .menu-toggle > .fa-times").toggleClass("fa-bars fa-times");
//         $(this).toggleClass("active");
//     });

//     $('#buttonFlipQuiz').click(function(){
//         $("#jeu").slideToggle("slow");
//     });

// });