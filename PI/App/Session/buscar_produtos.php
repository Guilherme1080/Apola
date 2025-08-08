<?php
require '../../App/config.inc.php';

if (isset($_GET['termo'])) {
    $termo = trim($_GET['termo']);

    $produtos = Produto::buscarProdutoPorNome($termo);

    $resultados = [];
    
    foreach ($produtos as $produto) {
        $resultados[] = [
            'id' => $produto['id_produto'],
            'nome' => $produto['nome'],
            'imagem' => $produto['imagem']
        ];
    }

    echo json_encode($resultados);
}
