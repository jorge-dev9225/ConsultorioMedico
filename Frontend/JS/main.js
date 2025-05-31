document.addEventListener('DOMContentLoaded', function() {

    EventListeners();    
});

function EventListeners(){ 
    const mobileMenu = document.querySelector('.mobile-menu');
    
    mobileMenu.addEventListener('click', navegacionResponsive)
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.header-der');
    const navegacion2 = document.querySelector('.header-izq');

    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    }
    if(navegacion2.classList.contains('mostrar')){
        navegacion2.classList.remove('mostrar');
    }else{
        navegacion2.classList.add('mostrar');
    }
}

