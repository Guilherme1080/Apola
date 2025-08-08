<?php
require_once '../Entity/Avaliacao.class.php';

header("Access-Control-Allow-Origin: *");
header('Cache-Control: no-cache, must-revalidate'); 
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 200 OK");

$dados = file_get_contents("php://input");
$newDados = json_decode($dados);

if ($newDados) {
    $avaliacao = new Avaliacao();
    $avaliacao->notas = $newDados->notas;
    $avaliacao->comentario = $newDados->comentario;
    $avaliacao->id_cliente = $newDados->id_cliente;
    $resultado = $avaliacao->cadastrarAvaliacao();

    echo json_encode([
        "success" => $resultado ? true : false,
        "message" => $resultado ? "Avaliação cadastrada com sucesso." : "Erro ao cadastrar avaliação."
    ]);
}else {
    echo json_encode([
        "success" => false,
        "message" => "Dados inválidos ou não recebidos."
    ]);
}