<?php


require '../../App/config.inc.php';

require '../../App/Session/Login.php';

include "head.php";


$result = Login::IsLogedCliente();


if($result){
    include "navbar_logado.php";
}else{
    header('location: login.php');
}

$id_cliente = $_SESSION['cliente']['id_cliente'];

$cliente = Cliente::getClienteById($id_cliente);



?>
    <main  class="main2">
        <div class="container_cart">
            <div class="container_header_cart">
                <a href="./Home.php" style="text-decoration: none;"><i class="fa-solid fa-chevron-left"></i></a>
                <div class="name_cart">SACOLA</div>
            </div>
            <div class="container_body_cart">
                <ul class="conatiner_list_item_cart">
                    <li>Produto</li>
                    <li>Preço Un.</li>
                    <li>Quantidade</li>
                    <li>Total</li>
                </ul>
                <div class="shape_sacola"></div>
                <div class="teste-cart" id="DivIdCart">
        

                </div>
              
            </div>
            <div class="conatiner_final_carrinho">
                <div class="conatiner_final_carrinho_left">
                    <div class="item_edereco_carrinho">
                        <input type="hidden" id='iputCepStatus'>
                        <div class="radio_cep" id="radio_cep2"></div>
                        <div class="text_carrinho_endereco">
                            Endereço - <?= $cliente['rua'] ?>, <?= $cliente['numero_casa'] ?>, <?= $cliente['bairro'] ?>, <?= $cliente['estado'] ?> - CEP: <?= $cliente['cep'] ?>
                        </div>

                    </div>
                    <div class="item_edereco_carrinho">
                        <div class="radio_cep" id="radio_cep"></div>
                        <div class="text_carrinho_endereco" id='newEndereco'  >Outro endereço</div>
                    </div>
                    <div class="conatiner_cep_drop" id="conatiner_cep_drop">
                        <div class="conatiner_cep_drop_input_btn">
                            <input id='input-cep' type="text">
                            <button  id='btn-input-cep'  class="btn_input_cep" ><i class="fa-solid fa-truck"></i></button>

                        </div>
                    </div>
                    <div id='new_edereco'  class="text_carrinho_endereco">
                          
                    </div>
                    <div id='divErr' class="err-alert"></div>
                    
                </div>
                <div class="conatiner_final_carrinho_right">
                    <div class="body_conatiner_final_right">
                        <div class="item_preco_carrinho">
                            <div class="preco_text_carrinho">
                                SubTotal
                                
                            </div>
                            <div id='subtotal' class="preco_text_carrinho">
                                    00,00 R$

                            </div>
            
                        </div>
                        <div class="linha_preco_carrinho"></div>
                        <div class="item_preco_carrinho">
                            <div class="preco_text_carrinho">
                                Taxa de Entrega
                                
                            </div>
                            <div class="preco_text_carrinho">
                                15,65 R$

                            </div>
                        </div> 
                        <div class="linha_preco_carrinho"></div>
                        <div class="item_preco_carrinho">
                            <div style="font-weight: 600;" class="preco_text_carrinho">
                                Valor Total
                                
                            </div>
                            <div  id='total'  style="font-weight: 600;"class="preco_text_carrinho">
                                 00,00 R$

                            </div>
                        </div>
                        <div class="linha_preco_carrinho"></div>
                        <div class="conatiner_btn_finalizar_compra_cart">
                            <button id="btn-finalizar" class=" open-modal btn_finalizar">Finalizar Pedido</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
       

    </main>


    <div id='alertModal' class="alertModalErr">
        <div class="diverrborder">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div id="divErrmodal">
        </div>

    </div>

    <div >

    </div>

    <div class='opacity-modal' id='opacityModal'>

    </div>
    <div class='ModalSucess' id='ModalSucess'>
    </div>


   


    
<?php

include "footer.php";



?>