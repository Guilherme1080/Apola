<main class="main_perfil">
    <section class="container_perfil">
        <div class="left-container_favoritos">
            <div class="container_favoritos_left">
                <div class="title_left_favoritos">Meu Perfil</div>
                <ul>
                    <li class="item_favorito_left">
                        <i class="fa-solid icon_favorito_content  fa-house"></i><a class="link_favorito_left" href="">Conta</a>
                    </li>
                    <li class="item_favorito_left">
                        <i class="fa-solid icon_favorito_content fa-heart"></i><a class="link_favorito_left" href="../Pages/Favoritos.html">Favoritos</a>
                    </li>
                    <li class="item_favorito_left">
                        <i class="fa-solid  icon_favorito_content fa-boxes-stacked"></i><a class="link_favorito_left" href="">Histórico de Pedidos</a>
                    </li>
                </ul>


            </div>
        </div>
        <div class="right_container_perfil">
            <div class="container_right_perfil">
                <div class="container_banner_perfil">
                    <img src="" alt="">
                    <div class="shape_perfil">
                        <img src="../src/imagens/img_categorias/bastidor-de-bordar.png" alt="">
                    </div>
                </div>
                <form class="inputs_perfil">
                    <div class="container_btn_perfil">
                        <button class="btn_cancelar">Cancelar</button>
                        <button class="btn_salvar">Salvar</button>
                    </div>
                    <div class="input_perfil_container">
                        <div class="input_item_perfil">
                            <label for="">Nome Usuário:</label>
                            <div class="container_edit_perfil">
                                <input type="text" name="nome_user" id="">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                        </div>
                        <div class="input_item_perfil">
                            <label for="">Nome Completo:</label>
                            <div class="container_edit_perfil">
                                <input type="text" name="nome" id="">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                        </div>
                        <div class="input_item_perfil">
                            <label for="">Email:</label>
                            <div class="container_edit_perfil">
                                <input type="email" name="email" id="">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                        </div>
                        <div class="input_item_perfil">
                            <label for="">Senha:</label>
                            <div class="container_edit_perfil">
                                <input type="senha" name="senha" id="">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                        </div>
                        <div class="input_item_perfil">
                            <label for="">CEP:</label>
                            <div class="container_edit_perfil">
                                <input type="text" name="cep" id="">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                        </div>
                        <div class="input_item_perfil">
                            <label for="">N*:</label>
                            <div class="container_edit_perfil">
                                <input class="input_esp_num" type="text" name="num_casa" id="">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                        </div>
                        <div class="input_item_perfil">
                            <label for="">Telefone:</label>
                            <div class="container_edit_perfil">
                                <input type="tel" name="telefone" id="">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                        </div>
                        <div class="input_item_perfil">
                            <label for="">Rua:</label>
                            <div class="container_edit_perfil">
                                <input type="text" name="rua" id="">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                        </div>
                        <div class="input_item_perfil">
                            <label for="">CPF:</label>
                            <div class="container_edit_perfil">
                                <input type="text" name="cpf" id="">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                        </div>
                        <div class="input_item_perfil">
                            <label for="">Bairro:</label>
                            <div class="container_edit_perfil">
                                <input type="text" name="bairro" id="">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                        </div>
                        <div class="input_item_perfil">
                            <label for="">Cidade:</label>
                            <div class="container_edit_perfil">
                                <input type="text" name="cidade" id="">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                            <div data-modal="modal-1" class="endereco_cadastrados open-modal">Endereços Cadastrados</div>
                            <!-- MODAL QUE APOS CLICAR NO ENDEREÇOSCADATARDOS MOSTRA TODOS OS ENDEREÇOS JA CADATRADOS PARA SELECIONAR UM PADRÃO -->
                            <dialog id="modal-1">
                              <div class="modal_header">
                                <button class="close-modal" data-modal="modal-1"><i class="fa-solid fa-xmark"></i></button>
                              </div>
                              <div class="modal_body">
                                <h5 class="title_modal_zap">Endereços Cadatrados</h5>
                                <div class="text_modal_zap">Selecione o endereço padrão de envio desejado.</div>
                                <form class="container_form_modal_email">
                                  <div class="item_endereco_cadastrados_modal">
                                      <div class="selection_shape_modal"></div>
                                      <h6 class="text_endereco_cadatrados_modal">Avenida dos Eucaliptos, 789, Centro, RJ</h6>
                                  </div>
                                  <div class="item_endereco_cadastrados_modal">
                                      <div class=" selection_shape_modal active"></div>
                                      <h6 class="text_endereco_cadatrados_modal">Avenida dos Eucaliptos, 789, Centro, RJ</h6>
                                  </div>
                                  <div class="container_btn_modal_email">
                                    <button class="btn_enviar_modal_email">Salvar</button>
                                  </div>
                                </form>  
                              </div>
                            </dialog>
                            <script src="../src/JS/modal.js"></script>
                        </div>
                        <div class="input_item_perfil">
                            <label for="">Estado:</label>
                            <div class="container_edit_perfil">
                                <input class="input_esp_num" type="text" name="num_casa" id="">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
            
        </div>
    </section>

</main>