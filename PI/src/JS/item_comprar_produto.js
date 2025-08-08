
let ContentSolo = document.querySelectorAll('.descricao_produto_solo_cont');
const BtnFecharSolo = document.querySelectorAll('.icone_produto_solo_item');



ContentSolo.forEach(cotsolo =>{
    
    let BtnFechar = cotsolo.querySelector('.icone_produto_solo_item');
    cotsolo.addEventListener('click', () =>{
        const body = cotsolo.querySelector('.descricao_produto_solo_cont_body');
        body.classList.add('active_solo');
        BtnFechar.classList.add('rorate_icone');

        
    })

})




BtnFecharSolo.forEach(soloFechar => {
    soloFechar.addEventListener('click', (event) => {
        event.stopPropagation(); 
        const body = soloFechar.closest('.descricao_produto_solo_cont').querySelector('.descricao_produto_solo_cont_body');
        body.classList.remove('active_solo');
    });
});







let Subtracao = document.getElementById('sub_item_solo');
let Adicao = document.getElementById('sum_item_solo');
let Result = document.getElementById("quant_item_solo");

let Valor = document.getElementById("valor_produt");









Adicao.addEventListener('click', () => {


    let valorAtual = parseInt(Result.innerHTML);
    Result.innerHTML = valorAtual + 1;
    
    let ValorProdut = parseFloat(Valor.innerHTML);
    Valor.innerHTML = ValorProdut + ValorProdut;

    console.log(typeof(valorAtual));
});

Subtracao.addEventListener('click', () => {
    let valorAtual = parseInt(Result.innerHTML);
    switch(valorAtual){
        case 1:
            break;
        default:
            Result.innerHTML = valorAtual - 1;

                
            let ValorProdut = parseFloat(Valor.innerHTML);
            teste = ValorProdut/2;
            Valor.innerHTML = ValorProdut - teste;

            console.log(typeof(valorAtual));
            console.log(valorAtual);

    }

});



let Subtracao2 = document.getElementById('sub_item_solo2');
let Adicao2 = document.getElementById('sum_item_solo2');
let Result2 = document.getElementById("quant_item_solo2");

let Valor2 = document.getElementById("valor_produt");




Adicao2.addEventListener('click', () => {


    let valorAtual = parseInt(Result2.innerHTML);
    Result2.innerHTML = valorAtual + 1;
    
    let ValorProdut = parseFloat(Valor2.innerHTML);
    Valor2.innerHTML = ValorProdut + ValorProdut;

    console.log(typeof(valorAtual));
});

Subtracao2.addEventListener('click', () => {
    let valorAtual = parseInt(Result2.innerHTML);
    switch(valorAtual){
        case 1:
            break;
        default:
            Result2.innerHTML = valorAtual - 1;

                
            let ValorProdut = parseFloat(Valor2.innerHTML);
            teste = ValorProdut/2;
            Valor2.innerHTML = ValorProdut - teste;

            console.log(typeof(valorAtual));
            console.log(valorAtual);

    }

});





