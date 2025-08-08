

document.addEventListener('DOMContentLoaded', function(){

    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let QuanCart  = document.querySelectorAll('.quantCartId')

    QuanCart.forEach(element => {
        element.innerHTML = cart.length
    });


    let idsProdutos = cart.map(item => parseInt(item.id_produto));

    fetch('../../App/Actions/buscar_produtos.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ ids: idsProdutos })
    })
    .then(response => response.json())
    .then(produtos => {

        let total = 15.65;
        let subtotal = 0;

     

        produtos.forEach(prod => {
            console.log(prod)
            console.log(cart)
            const prodCart = cart.find(c => parseInt(c.id_produto) == prod.id_produto);
            console.log('teste')
            console.log(prod.preco * prodCart.quantidade)
            total += prod.preco * prodCart.quantidade;
            subtotal += prod.preco * prodCart.quantidade;
        });

        localStorage.setItem('totalCart', total.toFixed(2));
        const DivTotal = document.getElementById('total');
        if (DivTotal) DivTotal.textContent = `${total.toFixed(2)} R$`;

        const DivSubTotal = document.getElementById('subtotal');
        if (DivSubTotal) DivSubTotal.textContent = `${subtotal.toFixed(2)} R$`;

        let DivCart = document.getElementById('DivIdCart');
        DivCart.innerHTML = '';

    
        produtos.forEach(prod => {
        
            let prodCart = cart.find(c => parseInt(c.id_produto) == prod.id_produto);

            DivCart.innerHTML += `
            <ul class="produto_list_cart">
                <li class="produto_item_cart-1">
                    <div class="produto_item_cart_left">
                        <div class="container_img_produto_cart">
                            <img src="${prod.imagem}" alt="">
                        </div>
                    </div>
                    <div class="produto_item_cart_right">
                        <h6 class="name_produto_cart">${prod.nome}</h6>
                        <h6 class="detalhes_produto_cart">
                            <div class="cor_produto_cart">Cor - ${prod.cor ? prod.cor : ''}</div>
                            <div class="tamanho_produto_cart">Tamanho - ${prod.largura  }cm x ${prod.altura}cm</div>
                        </h6>
                    </div>
                </li>
                <li class="produto_item_cart-2">
                    <h6 class="preco_produto_cart">${prod.preco} R$</h6>
                </li>
                <li class="produto_item_cart-3">
                    <button data-id='${prod.id_produto}' class="subtrair_cart" > <i class="fa-solid fa-minus"></i> </button>
                    <h6 class="quant_produto_cart">${prodCart.quantidade}</h6>
                    <button data-id='${prod.id_produto}' class="adicionar_cart" > <i class="fa-solid fa-plus"></i> </button>
                </li>
                <li class="produto_item_cart-4">
                    <h6 class="preco_produto_cart"><div id="valor_produt${prod.id_produto}">${prod.preco * prodCart.quantidade}</div>  R$</h6>
                    <button data-id='${prod.id_produto}' class="container_remover_produto_cart remove_cart">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </li>
            </ul>
            <div class="shape_sacola"></div>
            `;
        });

        function updateCartUI(idProdutoItem, quantidade, novoTotal) {
            const elQuantidade = document.querySelector(`[data-id="${idProdutoItem}"]`)
                .closest('ul')
                .querySelector('.quant_produto_cart');
        
            if (elQuantidade) elQuantidade.textContent = quantidade;
        
            const elTotal = document.querySelector(`#valor_produt${idProdutoItem}`);
            if (elTotal) elTotal.innerHTML = `${novoTotal.toFixed(2)}`;
        }
        

        
        function addQuantCart(idProdutoItem) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
            let index = cart.findIndex(item => parseInt(item.id_produto) === parseInt(idProdutoItem));
        
            if (index !== -1) {
                cart[index].quantidade += 1;
                localStorage.setItem('cart', JSON.stringify(cart));
        
                const precoUnit = parseFloat(document.querySelector(`[data-id="${idProdutoItem}"]`)
                    .closest('ul')
                    .querySelector('.preco_produto_cart').textContent);
        
                let novoTotal = precoUnit * cart[index].quantidade;


                recalcularTotal(produtos)
                recalcularSubTotal(produtos)
        
                updateCartUI(idProdutoItem, cart[index].quantidade, novoTotal);
            }
        }


        function recalcularTotal(produtos) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let total = 15.65;
        
            produtos.forEach(prod => {
                const item = cart.find(c => parseInt(c.id_produto) === prod.id_produto);
                if (item) {
                    total += prod.preco * item.quantidade;
                }
            });


        
            localStorage.setItem('totalCart', total.toFixed(2));
            const DivTotal = document.getElementById('total');
            if (DivTotal) DivTotal.textContent = `${total.toFixed(2)} R$`;
        }

        function recalcularSubTotal(produtos) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let subtotal = 0;
        
            produtos.forEach(prod => {
                const item = cart.find(c => parseInt(c.id_produto) === prod.id_produto);
                if (item) {
                    subtotal += prod.preco * item.quantidade;
                }
            });


        
            localStorage.setItem('subTotal', subtotal.toFixed(2));
            const DivSubTotal = document.getElementById('subtotal');
            if (DivSubTotal) DivSubTotal.textContent = `${subtotal.toFixed(2)} R$`;
        }
        
        
        

        function subQuantCart(idProdutoItem) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
            let index = cart.findIndex(item => parseInt(item.id_produto) === parseInt(idProdutoItem));
        
            if (index !== -1) {
                if (cart[index].quantidade > 1) {
                    cart[index].quantidade -= 1;
        
                    localStorage.setItem('cart', JSON.stringify(cart));
        
                    const precoUnit = parseFloat(
                        document.querySelector(`[data-id="${idProdutoItem}"]`)
                            .closest('ul')
                            .querySelector('.preco_produto_cart')
                            .textContent.replace(/[^\d.,]/g, '') 
                            .replace(',', '.')
                    );
        
                    let novoTotal = precoUnit * cart[index].quantidade;
        
                    updateCartUI(idProdutoItem, cart[index].quantidade, novoTotal);
        
                    recalcularTotal(produtos);
                    recalcularSubTotal(produtos)
                } else {
                    cart.splice(index, 1);
        
                    localStorage.setItem('cart', JSON.stringify(cart)); 
        
                    const itemEl = document.querySelector(`[data-id="${idProdutoItem}"]`);
                    const parent = itemEl.closest('ul');
                    if (parent) {
                        parent.nextElementSibling?.remove(); 
                        parent.remove();
                    }
        
                    recalcularTotal(produtos);
                    recalcularSubTotal(produtos)
                }
            }
        }
        


        function RemoveCart(idProdutoItem) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
            let index = cart.findIndex(item => parseInt(item.id_produto) === parseInt(idProdutoItem));
        
            if (index !== -1) {
                cart.splice(index, 1); 

                localStorage.setItem('cart', JSON.stringify(cart));
        
                const itemEl = document.querySelector(`[data-id="${idProdutoItem}"]`);
                if (itemEl) {
                    const parent = itemEl.closest('ul');
        
                    if (parent) {
                        const totalEl = parent.nextElementSibling;
                        if (totalEl && totalEl.classList.contains('total_item')) {
                            totalEl.remove();
                        }
                        parent.nextElementSibling?.remove(); 
                        parent.remove();
                    }
                }
        
                recalcularTotal(produtos); 
                recalcularSubTotal(produtos);
            }
        }
        
        
        
        document.querySelectorAll('.adicionar_cart').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.getAttribute('data-id');
                addQuantCart(id);


            });
        });
        
        document.querySelectorAll('.subtrair_cart').forEach(btn => {
            btn.addEventListener('click', () => {

                const id = btn.getAttribute('data-id');
                subQuantCart(id);

                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                
                QuanCart.forEach(element => {
                    element.innerHTML = cart.length
                });
            });
        });
        
        document.querySelectorAll('.remove_cart').forEach(btn => {
            btn.addEventListener('click', () => {

            
                const id = btn.getAttribute('data-id');
                RemoveCart(id);

                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                
                QuanCart.forEach(element => {
                    element.innerHTML = cart.length
                });
                
            });
        });
        











    })
    .catch(err => {
        console.error('Erro ao buscar produtos:', err);
    });



    function verifyProdutoInCart(idProduto) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let found = false;
    
        for (let objectProd of cart) {
            if (objectProd.id_produto === idProduto) {
                objectProd.quantidade += 1;
    
                localStorage.setItem('cart', JSON.stringify(cart));
                found = true;
                break; 
            }
        }
    
        return found;
    }
    
    function AddCart(idProduto) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
        let productExists = verifyProdutoInCart(idProduto);
    
        if (!productExists) {
            let ProdutObject = {
                id_produto: idProduto,
                quantidade: 1,
            };
    
            cart.push(ProdutObject);
            localStorage.setItem('cart', JSON.stringify(cart));

       
        }


        return true
    }
    

    const BtnAddCart = document.querySelectorAll(".btn-cart-add"); 

    BtnAddCart.forEach(itemProdutoBtn => {

        itemProdutoBtn.addEventListener('click', () =>{

            let idProduto = itemProdutoBtn.getAttribute('data-id');

            let StatusCart = AddCart(idProduto)

            if(StatusCart){

                let cart = JSON.parse(localStorage.getItem('cart')) || [];

                QuanCart.forEach(element => {
                    element.innerHTML = cart.length
                });
            

    

            }
        
          
        })
        
    });

    const BtnInputCep = document.getElementById('btn-input-cep')
    const inputCep = document.getElementById('input-cep');


    BtnInputCep.addEventListener('click', () =>{

        let cep =inputCep.value
        fetch(`https://viacep.com.br/ws/${cep}/json/`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        })
        .then(response => response.json())
        .then(endereco => {
            console.log(endereco);


            const DivNewEndereco = document.getElementById('new_edereco')

            DivNewEndereco.style.display='flex'

            DivNewEndereco.innerHTML = `
                <div> 
                    Endereço - ${endereco.logradouro}, ${endereco.bairro}, ${endereco.estado} 
                </div>
                <div class='div-flex-input'> 
                    <input id='newNumber' placeholder='Numero'  type='text'> 
                    <input id='newComplemento' placeholder='Complemento' type='text'> 
                    <button id='newCepbtn' > Salvar </button>
                </div>
                

            `
            const BtnSaveNewCep = document.getElementById('newCepbtn')

            BtnSaveNewCep.addEventListener('click', () =>{

                const InputNewNumber = document.getElementById('newNumber')
                const InputNewComplemento = document.getElementById('newComplemento')

                const DivEndreco = document.getElementById('newEndereco')

                DivEndreco.innerHTML  = `

                    Endereço - ${endereco.logradouro}, ${InputNewNumber.value}, ${endereco.bairro}, ${endereco.estado}, Complemento: ${InputNewComplemento.value} - CEP: ${endereco.cep}  
                    
                    `
                DivNewEndereco.style.display='none'
            })
    
        })
        .catch(error => {
            console.error('Erro ao buscar CEP:', error);
            const DivErr = document.getElementById('divErr')

            DivErr.innerHTML = `CEP não é válido`;

            setTimeout(() => {
                DivErr.innerHTML = '';
            }, 4000);
            
        });
    })



    
   const BtnFinalizar = document.getElementById('btn-finalizar');

    BtnFinalizar.addEventListener('click', () => {
        let inputStatusCep = document.getElementById('iputCepStatus');
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        if (cart.length === 0) {
            const DivErr = document.getElementById('divErrmodal');
            const DivErrModal = document.getElementById('alertModal');

            DivErrModal.style.left = '0px';
            DivErr.innerHTML = `A sua sacola está vazia.`;

            setTimeout(() => {
                DivErr.innerHTML = '';
                DivErrModal.style.left = '-500px';
                DivErrModal.style.transition = 'all 0.2s ease';
            }, 4000);
            return;
        }


        let enderecoFinal;
        if (inputStatusCep.value === 'outro') {
      
            enderecoFinal = document.getElementById('newEndereco').innerText.trim();

            console.log(enderecoFinal)
        } else {
           
            enderecoFinal = document.querySelector('.text_carrinho_endereco').innerText.trim();
        }

        fetch('../../App/Actions/finalizar_pedido.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ 
                cartFinal: cart,
                endereco: enderecoFinal
            })
        })
        .then(response => response.json())
        .then(response => {
             console.log(response.status);

            if (response.status === 'success' || response.status == true) {

            localStorage.clear();('cart');

            QuanCart.forEach(element => {
                element.innerHTML = '0';
            });



            const DivModalSucess = document.getElementById('ModalSucess');
            const DivModalOpacity = document.getElementById('opacityModal');


            DivModalSucess.innerHTML =`
            
            <div class="modal_header">
                <button class="close-modal" id='closeModalSucces'><i class="fa-solid fa-xmark"></i></button>
            </div>
                <div class="modal_body">
                    <h5 class="title_modal_zap">Pedido Realizado!</h5>
                    <div class="text_modal_zap">Segue o link do nosso WhatsApp para realizar o pagamento. Entraremos em contato em breve.</div>
                    <div class="conatiner_item_modal_link_zap">
                    <div class="item_modal_link_zap">
                        <i class="fa-brands fa-whatsapp"></i>
                        <a target='blank' href="https://wa.me/">67 991924837</a>
                    </div>
                </div>  
            </div>
            
            `

            DivModalSucess.style.top ='280px'
            DivModalSucess.style.transition ='all 0.4s ease-in-out'
            DivModalOpacity.style.display='flex'


            let DivCart = document.getElementById('DivIdCart');
            DivCart.innerHTML = '';



            let DivCartClose = document.getElementById('closeModalSucces');


            DivCartClose.addEventListener('click', () =>{

                DivModalSucess.style.top ='-100px'
                DivModalSucess.style.display='none';
                DivModalOpacity.style.display='none'
               
            })


        } else {
            const DivErr = document.getElementById('divErrmodal');
            DivErr.style.left = '0px';
            document.getElementById('divErr').innerHTML = `Erro ao finalizar pedido.`;

            setTimeout(() => {
                document.getElementById('divErr').innerHTML = '';
                DivErr.style.left = '-500px';
            }, 4000);
        }
                
        });
    });


})