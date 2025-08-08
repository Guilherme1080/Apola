<main class="main-login">
    <header class="menu">
        <nav class="container-menu">
                <div class="img-menu">
                    <a href="../Pages/Home.html">
                        <img src="../Src/imagens/Apola__1_-removebg-preview.png" alt=""class="img-logo" >
                    </a>
                </div>
        </nav>
    </header>
    <section class="login">
        <div class="content-login">
            <div class="shape-login"></div>
            <div class="shape-login2"></div>
            <div class="img-container-login">
                <img src="../Src/imagens/login/Knitting-amico.png" alt="">
            </div>
            <div class="container-login">
                <div class="form-container">
                    <div class="text-login">Login</div>
                    <form  method="POST">
                        <div class="form__group field">
                            <input type="email" name='email' id="email-login" class="form__field" placeholder="E-mail" required>
                            <label for="email" class="form__label">E-mail*</label>
                        </div>
                        <div class="form__group field">
                            <input type="password" name='senha' id="senha-login"  class="form__field" placeholder="Senha" required>
                            <label for="senha" class="form__label">Senha*</label>
                        </div>
                        <div class="form__group field">
                            <input type="password" name='conf-senha' id="conf-senha-login" class="form__field" placeholder="Senha" required>
                            <label for="confsenha" class="form__label">Confirmação de senha*</label>
                        </div>
                        <div class="remenber">
                            <label for="">
                                <input type="checkbox"> Lembre-me
                            </label>
                            <p class="open-modal" data-modal="modal-1"><a href="#">Esqueceu a senha?</a></p>
                            <!-- MODAL QUE APÓS CLICAR EM RECUPERAR A SENHA É REDIRECIONADO PARA CONFIRMAR EMAIL PARA RECUPERAÇÃO DA SENHA -->
                            <dialog id="modal-1">
                            <div class="modal_header">
                                <button class="close-modal" data-modal="modal-1"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="modal_body">
                                <h5 class="title_modal_zap">Redefinição de Senha!</h5>
                                <div class="text_modal_zap">Informe um e-mail para recuperar a senha.</div>
                                <div class="form_modal" action="">
                                    <label class="label_modal" for="">Email</label>
                                    <input class="input_modal" type="email" name="" id="">
                                    <div class="container_btn_modal_email">
                                        <button class="btn_enviar_modal_email">Enviar</button>
                                    </div>
                                </div>
                            </div>
                            </dialog>
                            <script src="../src/JS/modal.js"></script>
                        </div>
                        <div class="btn-login">
                            <a href=""><button name='logar' type="submit">Entrar</button></a>
                        </div>
                        <p id="msnErro-login" class="msnErro-login"> <?=$alertaLogin?> </p>
                        <span class="span-login">Novo na Apola?<a href="../Pages/cadastro.php">Cadastra-se</a></span>
                    </form>
                </div>
            </div>
        </div>
    </section>
        
</main>