const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

// Sections d'affichages
var main = document.getElementById('secpizz');
var prod = document.getElementById('secprod');
// Formulaire ajout pizza
var formI = document.getElementById('form_insert_pi');
// Formulaire ajout produit
var formP = document.getElementById('form_insert_pro');

var pizShow = document.getElementById('pizShow');
var prodShow = document.getElementById('proShow');

// Fonctions d'affichage
let addPiz = document.getElementById('show_add_pi').addEventListener('click', () => {
    formI.classList.toggle('active');
})
let addPro = document.getElementById('show_add_pro').addEventListener('click', () => {
    formP.classList.toggle('active');
})

prodShow.addEventListener('click', () => {
    prod.classList.toggle('active');
    prodShow.classList.toggle('active');
});

pizShow.addEventListener('click', () => {
    main.classList.toggle('active');
    pizShow.classList.toggle('active');
})


// Définir le modal
var modal = [...document.querySelectorAll('.modal')];
// Get the button that opens the modal
var btn = [...document.querySelectorAll("span.del_but")];
// Get the <span> element that closes the modal
var span = [...document.querySelectorAll("span.close")];

modal.forEach((mod,ind)=>{
    btn[ind].addEventListener('click', () => {
         mod.style.display = "block"
    });

    span[ind].addEventListener('click', () => {
        mod.style.display = "none"
    })    
    
    window.addEventListener('click', (e) => {
        if(e.target == modal){
            modal.style.display = "none"
        }
    })
});
