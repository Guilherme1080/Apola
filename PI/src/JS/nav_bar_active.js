const ListItens = document.querySelectorAll(".side_bar-itens");
let caminhos = window.location.pathname.split("/").filter(Boolean);
let caminhoEspecifico = caminhos.pop();

Array.from(ListItens).filter(e => e.querySelector("a").href.split("/").filter(Boolean).pop() == caminhoEspecifico)[0].classList.add("active")



// ListItens.forEach((item) => {
//     itemEspecifico = item.querySelector("a").href.split("/").filter(Boolean).pop();
//     console.log(itemEspecifico)
//         if (caminhoEspecifico != "" && caminhoEspecifico === itemEspecifico){
//             item.classList.add("active")
//         }
// });