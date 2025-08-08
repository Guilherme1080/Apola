
<?php
require_once('../../App/Entity/Produto.class.php');
require_once('../../App/Entity/Categoria.class.php');

if (isset($_GET['termo'])) {
    $termo = $_GET['termo'];

    $produtos = Produto::buscarProduto("nome LIKE '%$termo%'");

    
    if ($produtos) {
        foreach ($produtos as $produto) {
      
            $categoria = Categoria::buscarCategoria("id_categoria = " . $produto->categoria_id_categoria)[0];

            echo '
                <div class="produto-busca-item">
                    <div class="div-flex-search-prod"> 
                        <img class="search-img-prod" src='.$produto->imagem.' alt="">
                         <a  href="./comprar_produto.php?id_produto='. $produto->id_produto .'">
                            <h3>' . $produto->nome . '</h3>
                        </a>    
                    </div>
                    
                    <p>' . $produto->descricao . '</p>

                    <div class="linha-search"> </div>
                </div>
            ';
        }
    } else {
        echo '<p>Nenhum produto encontrado.</p>';
    }
}
?>















