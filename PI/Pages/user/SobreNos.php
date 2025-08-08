<?php

include "head.php";

require '../../App/config.inc.php';

require '../../App/Session/Login.php';


if (Login::IsLogedCliente()) {
    include 'navbar_logado.php';
} 
else {
    include 'navbar_deslogado.php';
}
    



?>
    <main style=" margin-bottom: unset;"  class="main2">

        

        <section class="about_text">
            <div class="content_about_text">
                <div class="right_about_text">
                    <img src="../../src/imagens/login/asdfghjk.png" alt="">
                </div>
                <div class="left_about_text">
                    <div class="title_text_about"> Sobre nós <span class="title_text_about2"> Apola Artesanatos </span></div>
                    <div class="conteudo_text_about">  

                        <p class="texto_about">  
                        A Apola Ecommerce Artesanatos nasceu para conectar artesãos talentosos a um público que valoriza a autenticidade e o trabalho manual.
                        Nossa loja virtual oferece uma curadoria especial de produtos artesanais, incluindo itens decorativos, joias, roupas, acessórios e utilidades domésticas, todos feitos com dedicação e qualidade por artesãos locais e regionais.
                        Nosso propósito é ampliar a visibilidade do artesanato, promovendo a cultura e incentivando o consumo consciente.
                        Trabalhamos para garantir uma experiência de compra intuitiva, segura e satisfatória, com um catálogo detalhado, fotos de alta qualidade e um checkout simplificado. Além disso, proporcionamos um ambiente onde artesãos podem gerenciar seus estoques e pedidos com facilidade.
                        </p>

                        <p class="texto_about">
                        Acreditamos que cada peça conta uma história e queremos levá-las até você. Siga-nos nas redes sociais e faça parte dessa comunidade apaixonada por arte e criatividade. Juntos, valorizamos o feito à mão!
                        </p>
                        
        
                    
                    </div>
                    <div class="content_number_dados_sobre">

                        <div class="couteudo_dados_sobre">
                            <div class="number_dados_sobre" data-target="28">0</div>
                            <div class="text_dados_sobre">Eventos ou feiras participadas </div>
                        </div>

                        <div class="couteudo_dados_sobre">
                            <div class="number_dados_sobre" data-target="894">0</div>
                            <div class="text_dados_sobre">Produtos vendidos</div>
                        </div>

                        <div class="couteudo_dados_sobre">
                            <div class="number_dados_sobre" data-target="74">0</div>
                            <div class="text_dados_sobre">Modelos exclusivos criados à mão</div>
                        </div>

                    </div> 

                    
                </div>

            </div>
        </section>

       

        <!-- SEÇÃO DE COMENTÁRIOS DOS USUÁRIOS -->
        <section class="comentarios-container content_card_avalicao_sobre"> <!-- Define o Formato do Container -->
        <div class="title_text_about"> O que dizem <span class="title_text_about2"> sobre nós?</span></div>

            <!-- Slides do Carrossel -->
            <div class="swiper_sobre">
                

                    <!-- Card dos Comentários -->
                   
                <div class="swiper-wrapper" id="carregar-avaliacoes-sobre-nois"></div>
                  
                   
                    
            </div>

            <!-- Setinhas do Carrossel -->
            <div class="swiper-pagination-sobre"></div>
            <div class="btn_card_sobre">
                <div class="btn_prev_card_avaliacao"><i class="fa-solid default_btn_icon_card fa-chevron-left"></i></div>
                <div class="btn_next_card_avaliacao"><i class="fa-solid default_btn_icon_card fa-chevron-right"></i></div>
            </div>
        </section>

        
        <!-- Container da avaliação -->
        <section class="sessao-avaliacao">
        <div class="title_text_about"> Deixe sua <span class="title_text_about2"> Avaliação</span></div>
            <div class="avaliacao-container">
                
                <form class="avaliacao-form" id="formulario_avaliacao" method="POST">
                    
                    <div class="form-row">
                        
                        <div class="form-group nota">

                            <div class="estrelas-avaliacao">
                                <input type="radio" id="estrela5" name="nota" value="5"><label for="estrela5"><i class="fas fa-star"></i></label>
                                <input type="radio" id="estrela4" name="nota" value="4"><label for="estrela4"><i class="fas fa-star"></i></label>
                                <input type="radio" id="estrela3" name="nota" value="3"><label for="estrela3"><i class="fas fa-star"></i></label>
                                <input type="radio" id="estrela2" name="nota" value="2"><label for="estrela2"><i class="fas fa-star"></i></label>
                                <input type="radio" id="estrela1" name="nota" value="1"><label for="estrela1"><i class="fas fa-star"></i></label>
                            </div>
                        </div>
    
    
    
                        <!-- Campo Mensagem ao centro -->
                        <div class="form-group mensagem">
                        <textarea maxlength="200" id="mensagem" name="mensagem" placeholder="Como foi sua experiência?" required oninput="atualizarContador()"></textarea>
                        <small><span id="contador">0</span>/200 caracteres</small>
                        </div>
                        <!-- Botão ao lado -->
                        <div class="form-group botao">
                            <button type="submit" class="botao-enviar">Enviar Avaliação</button>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-sobre-nois-avaliado">
                <div class="conteudo-modal">
                    <i class="fa-solid fa-check"></i>
                    <p>Avaliado com sucesso!</p>
                </div>
            </div>
            <div class="modal-sobre-nois-not-avaliado">
                <div class="conteudo-modal-not">
                    <p>Você deve estar logado para avaliar!</p>
                    <p>Realizar <a href="Login.php">Login</a></p>
                </div> 
            </div>
            <div class="modal-sobre-nois-sem-estrela">
                <div class="conteudo-modal-sem-estrela">
                    <p>Você deve inserir ao menos uma estrela para avaliar!</p>
                </div> 
            </div>
        </section>

    </main>

<?php
include "footer.php";
?>

    




        
 






        