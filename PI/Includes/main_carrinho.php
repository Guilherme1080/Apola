<main>
    <div class="container_cart">
        <div class="container_header_cart">
            <i class="fa-solid fa-chevron-left"></i>
            <div class="name_cart">SACOLA</div>
        </div>
        <div class="container_body_cart">
            <ul class="conatiner_list_item_cart">
                <li>Produto</li>
                <li>Preço</li>
                <li>Quantidade</li>
                <li>Total</li>
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
                            <h6 class="desconto_produto_cart">-122.60 R$</h6>
                            <h6 class="preco_produto_cart">99,60 R$</h6>
                        </h6>

                    </div>
                </li>
                <li class="produto_item_cart-2">
                   <h6 class="desconto_produto_cart">- 122.60 R$</h6>
                   <h6 class="preco_produto_cart">99,60 R$</h6>
                </li>
                <li class="produto_item_cart-3">
                   <h6 class="adicionar_produto_cart">-</h6>
                    <h6 class="quant_produto_cart">1</h6>
                   <h6 class="subtrair_produto_cart">+</h6>
                </li>
                <li class="produto_item_cart-4 ">
                    <h6 class="preco_produto_cart">99,60 R$</h6>
                    <button class="container_remover_produto_cart">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </li>
            </ul>
            <div class="shape_sacola"></div>
        </div>
        <div class="container_final_cart">
            <div class="container_final_cart_left">
                <div class="conatiner_endereco_ativo_cart">
                    <input type="radio" name="" id="">
                    <h6 class="text_1_cart">Endereço - <span class="text_2_cart">Avenida dos Eucaliptos, 789, Centro, RJ - </span>CEP<span class="text_2_cart"> 79017772 = R$22,69</span></h6>
                </div>
                <div class="container_endereco_mobile_cart">
                    <input type="radio" name="" id="">
                    <h6 class="text_1_cart_mobile">Endereço - Avenida dos Eucaliptos, 789, Centro, RJ</h6>
                </div>
                <div class="conatiner_endereco_ativo_cart">
                    <input type="radio" name="" id="">
                    <h6 class="text_1_cart">Outro endereço </h6>
                </div>
                <div class="container_input_cep_cart">
                    <input type="text">
                    <button class="btn_cep_cart"><i class="fa-solid fa-truck"></i></button>
                </div>
                <h6 class="cep_text_cart">Informe o cep</h6>
            </div>

            <div class="container_final_cart_right">
                <div class="container_text_preco_final_cart">
                    <p class="sub_total_text_cart">Sub total</p>
                    <p class="sub_total_valor_cart">R$ 122,60</p>
                </div>
                <div class="shape_sacola_final"></div>
                <div class="container_text_preco_final_cart">
                    <p class="frete_total_text_cart">Frete</p>
                    <p class="frete_total_valor_cart">R$ 22,69</p>
                </div>
                <div class="shape_sacola_final"></div>
                <div class="container_text_preco_final_cart">
                    <p class="total_text_cart">Valor Total</p>
                    <p class="total_valor_cart">R$ 99,60</p>
                </div>
                <div class="shape_sacola_final"></div>
                
                <div data-modal="modal-1" class="btn_final_cart open-modal">Finalizar Pedido</div>  
            </div>
            <!-- <button class="open-modal" data-modal="modal-1">

            </button> -->
            <!-- MODAL QUE APÓS FINALIZAR O PEDIDO REDIRECIONA PARA O WHATSAP -->
            <dialog id="modal-1">
              <div class="modal_header">
                <button class="close-modal" data-modal="modal-1"><i class="fa-solid fa-xmark"></i></button>
              </div>
              <div class="modal_body">
                <h5 class="title_modal_zap">Pedido Realizado!</h5>
                <div class="text_modal_zap">Segue o link do nosso WhatsApp para realizar o pagamento. Entraremos em contato em breve.</div>
                <div class="conatiner_item_modal_link_zap">
                  <div class="item_modal_link_zap">
                    <i class="fa-brands fa-whatsapp"></i>
                    <a href="#">67 991924837</a>
                  </div>
                </div>  
              </div>
            </dialog>
            <script src="../src/JS/modal.js"></script>
          

        </div>
    </div>
   

</main>