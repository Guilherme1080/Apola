<?php

require_once(__DIR__ . '/../DB/Database.php');

class Sacola{

    public int $id_sacola;
    public float $preco_frete;
    public float $valor_total;
    public int $cep;
    public int $quant_produto;
    public int $produto_id_produto;
    public int $cliente_id_cliente;
    public int $pedido_id_pedido ;

    public function cadastrar(){

        $db = new Database('sacola');

        $result = $db->insert([
            'preco_frete' => $this->preco_frete,
            'valor_total' => $this->valor_total,
            'cep' => $this->cep,
            'quant_produto' => $this->quant_produto,
            'produto_id_produto' => $this->produto_id_produto,
            'cliente_id_cliente' => $this->cliente_id_cliente,
            'pedido_id_pedido ' => $this->pedido_id_pedido ,
        ]);

        return $result ? true : false;

    }

}