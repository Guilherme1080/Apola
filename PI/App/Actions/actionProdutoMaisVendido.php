<?php

header('Content-Type: application/json');

require '../../App/config.inc.php';
require '../../App/Session/Login.php';

$produto = new Produto();
$data = $produto->buscarProdutoMaisVendido(); 
//  print_r($data);
if ($data) {
    echo json_encode($data);
} else {
    echo json_encode(['error' => 'Nenhum dado encontrado']);
}
