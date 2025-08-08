const accordions = document.querySelectorAll('.accodion_footer_drop');

accordions.forEach(accordion =>{
    accordion.addEventListener('click', () =>{
        const body = accordion.querySelector('.accodion_body_footer');
        body.classList.toggle('accordion_active_footer');
    })
})


