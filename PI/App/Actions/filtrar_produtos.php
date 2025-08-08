<?php
require '../../App/config.inc.php';

$dados = json_decode(file_get_contents('php://input'), true);

$nota = isset($dados['nota']) ? (int)$dados['nota'] : null;
$id_categoria = isset($dados['id_categoria']) ? (int)$dados['id_categoria'] : null;

$produto = new Produto();

if ($nota !== null && $id_categoria !== null) {
    $produtos = $produto->buscarProdutosPorNota($nota, $id_categoria);



} else {

    $produtos = $produto->buscarProduto("categoria_id_categoria = ".$id_categoria);
}

if (empty($produtos)) {
    echo json_encode(['status' => 'vazio', 'mensagem' => 'Nenhum produto com essa avaliação.']);
    exit;
}

echo json_encode(['status' => 'ok', 'produtos' => $produtos]);
