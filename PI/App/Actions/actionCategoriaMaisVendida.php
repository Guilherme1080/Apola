<?php

header('Content-Type: application/json');

require '../../App/config.inc.php';
require '../../App/Session/Login.php';

$categoria = new Categoria();
$data = $categoria->buscarCategoriasMaisVendidas(); 

if ($data) {
    echo json_encode($data);
} else {
    echo json_encode(['error' => 'Nenhum dado encontrado']);
}
