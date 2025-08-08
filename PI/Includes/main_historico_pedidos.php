<main class="main_favoritos">
    <section class="container_favortos">
        <div class="left-container_favoritos">
            <div class="container_favoritos_left">
                <div class="title_left_favoritos">Meu Perfil</div>
                <ul>
                    <li class="item_favorito_left">
                        <i class="fa-solid icon_favorito_content  fa-house"></i><a class="link_favorito_left" href="../Pages/Perfil.html">Conta</a>
                    </li>
                    <li class="item_favorito_left">
                        <i class="fa-solid icon_favorito_content fa-heart"></i><a class="link_favorito_left" href="">Favoritos</a>
                    </li>
                    <li class="item_favorito_left">
                        <i class="fa-solid  icon_favorito_content fa-boxes-stacked"></i><a class="link_favorito_left" href="">Histórico de Pedidos</a>
                    </li>
                </ul>


            </div>
        </div>
        <div class="right_container_favoritos">
            <div class="container_historico_pedido">
                <div class="container_btn_historico_pedidos">
                    <div class="btn_pedidos_historico hp">Pedidos</div>
                    <div class="btn_pedidos_historico">Recebidos</div>
                </div>
                <div class="container_body_cart">
                    <ul class="conatiner_list_item_cart">
                        <li>Produto</li>
                        <li>Preço</li>
                        <li>Quantidade</li>
                    </ul>
                    <div class="shape_sacola"></div>
                    <ul class="produto_list_cart">
    
                        <li class="produto_item_cart-1">
                            <div class="produto_item_cart_left">
                                <div class="container_img_produto_cart">
                                    <img src="../src/imagens/card_produto/IMG1-Produto.png" alt="">
                                </div>
                            </div>
                            <div class="produto_item_cart_right">
                                <h6 class="name_produto_cart">Amigurumi Ursos Sem Curso</h6>
                                <h6 class="detalhes_produto_cart">
                                    <div class="cor_produto_cart">Cor - Preto //</div>
                                    <div class="tamanho_produto_cart">Tamanho - 10 cm</div>
                                </h6>
                                <h6 class="detalhes_produto_cart_mobile">
                                    <h6 class="preco_produto_cart">99,60 R$</h6>
                                </h6>
    
                            </div>
                        </li>
                        <li class="produto_item_cart-2">
                           <h6 class="preco_produto_cart">99,60 R$</h6>
                        </li>
                        <li class="produto_item_cart-3">
                            <div class="text_quant_mobile_hist">Qut.</div>
                           <h6 class="preco_produto_cart">1</h6>
                        </li>
                    </ul>
                    <ul class="produto_list_cart">
    
                        <li class="produto_item_cart-1">
                            <div class="produto_item_cart_left">
                                <div class="container_img_produto_cart">
                                    <img src="../src/imagens/card_produto/IMG1-Produto.png" alt="">
                                </div>
                            </div>
                            <div class="produto_item_cart_right">
                                <h6 class="name_produto_cart">Amigurumi Ursos Sem Curso</h6>
                                <h6 class="detalhes_produto_cart">
                                    <div class="cor_produto_cart">Cor - Preto //</div>
                                    <div class="tamanho_produto_cart">Tamanho - 10 cm</div>
                                </h6>
                                <h6 class="detalhes_produto_cart_mobile">
                                    <h6 class="preco_produto_cart">99,60 R$</h6>
                                </h6>
    
                            </div>
                        </li>
                        <li class="produto_item_cart-2">
                           <h6 class="preco_produto_cart">99,60 R$</h6>
                        </li>
                        <li class="produto_item_cart-3">
                            <div class="text_quant_mobile_hist">Qut.</div>
                           <h6 class="preco_produto_cart">1</h6>
                        </li>
                    </ul>
                    .
                    <div class="shape_sacola"></div>
                    <div class="container_final_cart">
                        <div class="container_final_cart_left">
                         
                            <ul class="status_shape_hist">
                                <li class="active_entrega_shape"><i class="fa-solid fa-check"></i></li>
                                <div class="linha_shape_hist "></div>
                                <li class="item_shape_hist"></li>
                                <div class="linha_shape_hist"></div>
                                <li class="item_shape_hist"></li>
                            </ul>
                            <ul class="name_status_hist">
                                <li class="item_name_hist">
                                    Produção
                                </li>
                                <li class="item_name_hist">
                                    A caminho
                                </li>
                                <li class="item_name_hist">
                                    Entregue
                                </li>
                            </ul>

                           
                        </div>
        
                        <div class="container_final_cart_right">
                            <div class="container_text_preco_final_cart">
                                <p class="sub_total_text_cart">Sub total</p>
                                <p class="sub_total_valor_cart">R$ 122,60</p>
                            </div>
                            <div class="shape_sacola_final"></div>
                            <div class="container_text_preco_final_cart">
                                <p class="sub_total_text_cart">Total</p>
                                <p class="sub_total_valor_cart">R$ 99,60</p>
                            </div>
                            <div class="shape_sacola_final"></div>
                            <div class="container_text_preco_final_cart">
                                <p class="total_text_cart">Cód. Rastreio:</p>
                                <p class="total_valor_cart">LX123456789BR</p>
                            </div>
                            <div class="shape_sacola_final"></div>
                            
                            <button data-modal="modal-1" class="btn_final_cart open-modal">Rastrei sua Econmenda</button>
                        </div>
                        <!-- <button class="open-modal" data-modal="modal-1">

                        </button> -->
                        <!-- MODAL QUE APÓS CLICAR EM RATREIA SUA ECOMENDA REDIRECIONA PARA O SITE DOS CORREIOS-->
                      
                        <dialog id="modal-1">
                          <div class="modal_header">
                            <button class="close-modal" data-modal="modal-1"><i class="fa-solid fa-xmark"></i></button>
                          </div>
                          <div class="modal_body">
                            <h5 class="title_modal_zap">Rastreie sua Ecomenda!</h5>
                            <div class="text_modal_zap">Segue o link dos correios para verificar o andamento da entrega a partir do código de ratreio do seu pedido.</div>
                            <div class="conatiner_item_modal_link_zap">
                              <div class="item_modal_link_zap">
                                  <i class="fa-solid fa-box"></i>
                                <a target="_blank" href="https://rastreamento.correios.com.br/app/index.php">Acesse os correios</a>
                              </div>
                            </div>  
                          </div>
                        </dialog>
                        <script src="../src/JS/modal.js"></script>
        
                    </div>
                </div>
                
            </div>
           

        </div>
    </section>



</main>
