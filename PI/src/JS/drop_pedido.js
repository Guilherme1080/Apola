// const btnOpenDrop = document.getElementById("btnOpenDrop");
// const ConteudoDrop = document.getElementById("ConteudoDrop");



let contentBodyCarts = document.querySelectorAll(".container_body_cart");




contentBodyCarts.forEach(content_body => {

    let btnOpenCart = content_body.querySelector('.conatiner_btn_drop')

    btnOpenCart.addEventListener('click', ()=>{
        let body = content_body.querySelector('.container_final_cart');
        body.classList.toggle('active_pedido');


    })
    
});



// btnOpenDrop.addEventListener('click', () => {
//     ConteudoDrop.classList.toggle('active_pedido');
// });

