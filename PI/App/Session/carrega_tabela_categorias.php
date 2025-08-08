<?php

require_once '../Entity/Categoria.class.php';

$objProd = new Categoria();

$whereClauses = [];

// Filtro por status (opcional, caso queira manter)
if (!isset($_GET['status']) || $_GET['status'] == '' || $_GET['status'] == 'todos') {
    // sem filtro por status
} 
else if ($_GET['status'] == 'inativos') {
    $whereClauses[] = 'status_categoria = "i"';
}
else if ($_GET['status'] == 'ativos') {
    $whereClauses[] = 'status_categoria = "a"';
}

// Filtro de busca (nome ou id)
if (isset($_GET['search']) && trim($_GET['search']) !== '') {
    $search = addslashes(trim($_GET['search']));
    // Busca pelo nome LIKE ou pelo id_categoria igual ao valor (se for número)
    $searchNum = is_numeric($search) ? $search : 0;
    $whereClauses[] = "(nome LIKE '%$search%' OR id_categoria = $searchNum)";
}

$where = '';
if (count($whereClauses) > 0) {
    $where = implode(' AND ', $whereClauses);
}

$dados = $objProd->buscarCategoria($where);

if ($dados) {
    echo json_encode($dados);
} else {
    echo json_encode([]);
}
