<?php


require '../../App/config.inc.php';

require '../../App/Session/Login.php';

include "head.php";


$result = Login::IsLogedCliente();


if($result){
    include 'navbar_logado.php';

}else{
    include 'navbar_deslogado.php';

}


if(isset($_GET['id_categoria'])){
    $id_categoria = $_GET['id_categoria'];
}


$categoria = Categoria::SelectCategoriaPorId($id_categoria);


$produto = new Produto();
$produtos = $produto->buscarProdutoCategoriaNota($id_categoria);

// if($produtos)



?>
    <main  class="main2">
        <div class="container_categorias">

            <aside class="top_categoria_mobile">
                <div class="shape_categoria_top"></div>
               
                <div class="shape_categoria_top"></div>
            </aside>
            <div class="top_mobile_filtro_open" id="open_filtro">
                <div class="accordion_mobile_filtro">
                    <button class="accodion-header_mobile">
                        <h6 class="name_item_filtro_cat">
                            Avaliação
                        </h6>
                        <i class="fa-solid fa-chevron-down arrow"></i>
                    </button>
                    
                    <div class="accordion-body_mobile">
                         <?php for ($i = 5; $i >= 1; $i--): ?>
                            <div class="flex_filtro_cat">
                                <input class="filtro-nota" type="checkbox" value="<?= $i ?>" id="star-cat-<?= $i ?>">
                                <h6 class="star_filtro_cat clickable-stars" data-target="star-cat-<?= $i ?>">
                                    <?php for ($j = 1; $j <= 5; $j++): ?>
                                        <i class="fa-solid fa-star <?= $j > $i ? 'a' : '' ?>"></i>
                                    <?php endfor; ?>
                                </h6>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>


            <aside class="left_categoria">
                <!-- <div class="container_title_left_categoria">
                    <h6 class="title_left_categoria">Home</h6>
                    <h6 class="title_left_categoria">/</h6>
                    <h6 class="title_left_categoria">Amigurumi</h6>
                </div> -->
                <div class="conatiner_input_preco">
                    <h6 class="title_left_categoria  title_left_categoria_mobile">Faixa de Preço</h6>
                    <input type="range" id="preco" name="preco" min="0" max="1000" step="10" oninput="document.getElementById('rangeValue').innerText = this.value">
                    <div class="range-value">R$ <span id="rangeValue">500</span></div>
                </div>
                <div class="container_left_filtro">
                   <div class="item_filtro_cat">
                <div class="title_filtro_cat">Avaliação</div>

                <?php for ($i = 5; $i >= 1; $i--): ?>
                    <div class="flex_filtro_cat">
                        <input class="filtro-nota" type="checkbox" value="<?= $i ?>" id="star-cat-<?= $i ?>">
                        <h6 class="star_filtro_cat clickable-stars" data-target="star-cat-<?= $i ?>">
                            <?php for ($j = 1; $j <= 5; $j++): ?>
                                <i class="fa-solid fa-star <?= $j > $i ? 'a' : '' ?>"></i>
                            <?php endfor; ?>
                        </h6>
                    </div>
                <?php endfor; ?>

                <span class="linha_quebra_categoria"></span>
            </div>

            </aside>

            <aside class="right_categoria">

                <div class="container_filtro_right">
                    <div>
                        Home > <?php echo $categoria->nome ; ?>

                    </div>
                </div>
                <div class="wrap__filtro_right" id="produtos-container">
                    <!-- <a  style ="text-decoration:none;"class="link_produto_home" href="./comprar_produto.php"> -->
                    <?php
                    foreach ($produtos as $prod): 

                        $media = round($prod->media_notas ?? 0);
                        $estrelasHtml = '';
                        for ($i = 1; $i <= 5; $i++) {
                            $estrelasHtml .= $i <= $media 
                                ? '<i class="fa-solid fa-star"></i>' 
                                : '<i class="fa-regular fa-star"></i>';
                    }
                        
                        if($prod->status_produto === 'a'):
                    ?>
                        <div class="card_produto" style="max-width: 40%;">
                            <div class="icon_favorite">
                                    <label class="checkbox-heart">
                                        <input class="input-check" type="checkbox" data-status="'.$produto['status_favoritos'] .'" data-id="'.$produto['id_produto'].'" '.($produto['status_favoritos'] ? 'checked' : '').'>
                                        <i class="fa-solid fa-heart"></i>
                                    </label> 
                                </div>
                            <div class="img_content_produto">
                                <img src="../../<?= $prod->imagem ?>" alt="<?= htmlspecialchars($prod->nome) ?>">
                            </div>
                            <div class="conteudo_card">
                                <div class="nome_card_produto"><?= htmlspecialchars($prod->nome) ?></div>
                                <div class="content_star_icon">
                                    <?php echo $estrelasHtml; ?>
                                </div>
                                <div class="preco_card_produto">R$ <?= number_format($prod->preco, 2, ',', '.') ?></div>
                                <div class="btn_content_card_produto">
                                <button data-id="<?=  htmlspecialchars($prod->id_produto)?>" class="btn_bag_card btn-cart-add">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </button>
                                    <a href="./comprar_produto.php?id_produto=<?= $prod->id_produto ?>" class="btn_buy_card">Comprar</a>
                                </div>
                            </div>
                        </div>
                        <?php
                            endif;
                        endforeach;
                        ?>
                 

                </div>



            </aside>





        </div>



        
        <script src="../../src/JS/favoritos.js"></script>
        
    </main>
<?php

include "footer.php";



?>