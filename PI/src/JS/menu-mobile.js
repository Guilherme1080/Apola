let btnMenu = document.getElementById('btn-menu-abrir')
let menu = document.getElementById('mobile-btn')
let overlay = document.getElementById('overlay-mobile')
let btnFechar = document.getElementById('btn-fechar')

btnMenu.addEventListener('click', ()=>{
    menu.classList.add('abrir-menu')
})


btnFechar.addEventListener('click', ()=>{
    menu.classList.remove('abrir-menu')
})


overlay.addEventListener('click', ()=>{
    menu.classList.remove('abrir-menu')
})









let categorias = document.querySelectorAll('.categoria-content-mobile-items');
let submenus = document.querySelectorAll('.submenu-drop-mobile');
let voltarBotoes = document.querySelectorAll('.btn-voltar-submenu');


categorias.forEach((categoria, index) => {
    categoria.addEventListener('click', () => {
        submenus[index].classList.add('active');
    });
});




voltarBotoes.forEach((botao, index) => {
    botao.addEventListener('click', () => {
        submenus[index].classList.remove('active');
    });
});
