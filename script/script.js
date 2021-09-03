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
var formI = document.getElementById('form_insert');

// Fonctions d'affichage
let addPiz = document.getElementById('show_add').addEventListener('click', () => {
    formI.classList.toggle('active');
})

let prodShow = document.getElementById('proShow').addEventListener('click', () => {
    prod.classList.toggle('active');
});

let pizShow = document.getElementById('pizShow').addEventListener('click', () => {
    main.classList.toggle('active');
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
