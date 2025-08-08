
let btnFiltro = document.getElementById('btn_filtro');
let openFiltro = document.getElementById('open_filtro');

btnFiltro.addEventListener('click', () => {
    openFiltro.classList.toggle('active_filtro');
});




const accordions = document.querySelectorAll('.accordion_mobile_filtro');

accordions.forEach(accordion =>{
    accordion.addEventListener('click', () =>{
        const body = accordion.querySelector('.accordion-body_mobile');
        body.classList.toggle('active-accordion');
    })
})





