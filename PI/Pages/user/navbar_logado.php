<?php

// require '../../App/config.inc.php';

require_once '../../App/Session/Login.php';
require_once '../../App/Entity/Cliente.class.php';
require_once '../../App/Entity/Categoria.class.php';


$result = Login::IsLogedCliente();
if($result){
    $id_cliente = $_SESSION['cliente']['id_cliente'];

    $objCliente = new Cliente();
    
    $cli = $objCliente->getClienteById($id_cliente);

    $categorias= Categoria::buscarCategoria("status_categoria = 'a'");
    
}
?>
 


 <!-- INICIO MeENU NAVABAR -->
        <header class="menu">
            <nav class="container-menu">
                    <div class="img-menu">
                        <a href="./Home.php">
                            <img src="../../src/imagens/Banners/Logo/3.png" alt=""class="img-logo" >
                        </a>
                    </div>
                    <div class="barra-pesquisa">
                        <div class="container-barra">
                        <input class="input-pesquisa" id="input-busca" type="text" placeholder="Pesquise seu produto...">
                        <div id="resultado-busca" class="resultados-busca"></div>
                            <a href="#" class="btn-pesquisa">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>
            <!-- INICIO MENU MOBILE -->
                    <div class="btn-abrir-menu" id="btn-menu-abrir">
                        <i class="fa-solid fa-bars"></i>
                    </div>
    
                    <div class="mobile-btn" id="mobile-btn">
                        <div class="btn-fechar" id="btn-fechar">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <a  href="./perfil.php" class="content-mobile-top">
                            <div class="img-content-mobile">
                                
                                <?php if ($cli['foto_perfil']): ?>
                                    <img src="<?=$cli['foto_perfil'];?>" alt="Foto de Perfil">
                                    <?php else: ?>
                                    <img src="../../src/imagens/cadastro/perfil/img_padrao_perfil.jpg" alt="Foto de Perfil">
                                <?php endif; ?>

                            
                            
                            </div>

                        </a>
                        <div class="content-mobile-btn-login-cad">
                            <button class="btn-login-mobile">
                                <a href="./carrinho.php"><i class="fa-solid fa-bag-shopping"></i> Sacola</a>
                                <div class="quntCart2 quantCartId" >
                                </div>
                            </button>
                            
                            <button class="btn-cadastro-mobile">
                                <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Sair</a>
                            </button>
                        </div>
                        <div class="barra-pesquisa-mobile">
                            <div class="content-mobile-pesquisa">
                                <input type="text" id="input-busca-mobile" placeholder="Pesquise seu produto...">
                                <button class="btn-pesquisa-mobile">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                            <div id="resultado-busca-mobile" class="resultados-busca"></div>
                        </div>

    
                        <div class="content-conteudo-mobile">
                            <h5>Destaque</h5>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <a href="alterar_perfil.php"></i> Alterar Perfil</a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-fire"></i>
                                    <a href="./home.php">Em Alta</a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-box"></i>
                                    <a href=" ./produto_personalizado.php">Produto Personalizado</a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-people-group"></i>
                                    <a href="./SobreNos.php">Sobre Nós</a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-heart"></i>
                                    <a href="./Favoritos.php">Favoritos</a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-boxes-stacked"></i>
                                    <a href="./historico_pedido.php">Histórico de pedidos</a>
                                </li>
                            </ul>
                            <h5>Categorias</h5>
                            <ul>
                                <?php
                                    foreach ($categorias as $categoria) {
                                        
                                        echo'

                                        <li class="categoria-content-mobile-items">
                                            <a href="./categorias.php?id_categoria='. $categoria->id_categoria .'">'.$categoria->nome.'</a>
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </li>


                                        ';

                                    }

                                ?>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="overlay-mobile" id="overlay-mobile"></div>
            <!-- FIM MENU MOBILE -->
                    <div class="lista-item">
                        <nav class="itens-menu">
                            <ul class="menu-main">
                                <li class="icon-default-back">
                                    <a id="icon-default" href="./SobreNos.php">Sobre Nós</a>
                                </li>
                                <li class="icon-default-back">
                                    <a id="icon-default" href="./produto_personalizado.php">Personalize</a>
                                </li>
                                <li id="text-categoria">
                                    <a href="">Categorias<i class="fa-solid fa-chevron-down icon-seta"></i></a>
                                    <div class="mega-menu">
                                        <div class="mega-menu-content">

                                        <?php
 
                                            foreach ($categorias as $categoria) {
                                                
                                                echo'
                                                <div class="row">
                                                    <h3 class="Title-cat"><a href="./categorias.php?id_categoria='. $categoria->id_categoria .'">'.$categoria->nome.'</a></h3>
                                                    <ul class="mega-links">
                                                        <!-- <li><a href="">Amigurumi Cacto</a></li>
                                                        <li><a href="">Amigurumi Cacto</a></li>
                                                        <li><a href="">Amigurumi Cacto</a></li>
                                                        <li><a href="">Amigurumi Cacto</a></li> -->
                                                    </ul>
                                                </div>

                                                ';

                                            }

                                        ?>
                                        </div>
                                    </div>
                                </li>
                                <li class="icon-default-back">
                                    <a id="icon-default" href="./carrinho.php"><i class="fa-solid fa-bag-shopping"></i></a>
                                    <div class="quntCart quantCartId" >
                                    </div>
                                </li>
                                <li class="icon-default-back">
                                <a class="conatiner_navbar_perfil_2" href="./perfil.php"><img class="img_navbar_2" src="<?= $cli['foto_perfil']; ?>" alt=""></a>
                                 


                                      
                                    
                                
                                </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
            </nav>
            
        </body>
 
<script>
document.addEventListener('DOMContentLoaded', function () {
    const inputDesktop = document.getElementById('input-busca');
    const resultadosDesktop = document.getElementById('resultado-busca');

    const inputMobile = document.getElementById('input-busca-mobile');
    const resultadosMobile = document.getElementById('resultado-busca-mobile');

    function configurarBusca(input, resultados) {
        if (!input) return;

        input.addEventListener('keyup', function () {
            const termo = this.value.trim();

            if (termo.length > 1) {
                fetch('buscar.php?termo=' + encodeURIComponent(termo))
                    .then(res => res.text())
                    .then(dados => {
                        resultados.innerHTML = dados;

                        if (dados.trim() !== '') {
                            resultados.classList.add('mostrar');
                        } else {
                            resultados.classList.remove('mostrar');
                        }
                    })
                    .catch(err => {
                        console.error('Erro ao buscar:', err);
                        resultados.classList.remove('mostrar');
                    });
            } else {
                resultados.innerHTML = '';
                resultados.classList.remove('mostrar');
            }
        });

        // Oculta os resultados ao clicar fora
        document.addEventListener('click', function (e) {
            if (!input.contains(e.target) && !resultados.contains(e.target)) {
                resultados.classList.remove('mostrar');
            }
        });
    }

    // Ativa a busca para desktop e mobile
    configurarBusca(inputDesktop, resultadosDesktop);
    configurarBusca(inputMobile, resultadosMobile);
});
</script>




</header>
        

