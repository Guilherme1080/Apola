<?php

header('Content-Type: application/json');


require '../../App/config.inc.php';
require '../../App/Session/Login.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);


if (!isset($data['ids']) || !is_array($data['ids'])) {
    echo json_encode(['erro' => 'IDs inválidos']);
    exit;
}

$ids = array_map('intval', $data['ids']);


$produtos = Produto::buscarProdutoCart($ids);




echo json_encode($produtos);

