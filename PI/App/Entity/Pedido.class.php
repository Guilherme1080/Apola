<?php
require_once '../../App/DB/Database.php';

class Pedido {
    public string $data_pedido;
    public string $tipo;
    public string $status_pedido;
    public ?string $codigo_rastreio = null;
    public ?int $produto_perso_id_produto_perso;
    public ?int $id_cliente;
    
    public function cadastrar(){
        $db = new Database('pedido');
        $result = $db->insert_LastId([
            'tipo' => $this->tipo,
            'data_pedido' => $this->data_pedido,
            'status_pedido' => $this->status_pedido,
            'codigo_rastreio' => $this->codigo_rastreio,
            'id_cliente' => $this->id_cliente,
        ]);

        return $result;
    }
    public function cadastrarPerso($id){
        $db = new Database('pedido');
        $result = $db->insert([
        ]);

        return $result ? true : false;
    }

    public function buscarTodosPedidos($where = null, $order = null, $limit = null) {
        return (new Database('pedido'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function atualizar(){
        return (new Database('pedido'))->update('sacola_id_sacola = '.$this->sacola_id_sacola,[
        ]);
    }

    public static function buscar($where = ''){
        return (new Database('pedido'))->select_pedido($where);
    }
    
    public static function buscar_pedido_by_id($id){
        return (new Database('pedido'))->select_pedido_by_id($id)->fetch(PDO::FETCH_OBJ);
    }
    
    public static function buscar_pedidoperso_by_id($id){
        return (new Database('pedido'))->select_pedido_personalizado_by_id($id)->fetchObject(self::class);
    }
    

    public function excluir($sacola_id){
        return (new Database('pedido'))->delete('sacola_id_sacola = '.$sacola_id);
    }
    public function atualizarPedido($id) {
        $db = new Database('pedido');
        
        $pedido = $db->select('id_pedido = ' . $id)->fetch(PDO::FETCH_ASSOC);
    
        if ($pedido && $pedido['tipo'] === 'personalizado') {
            return $db->update('id_pedido = ' . $id, [
                'codigo_rastreio' => $this->codigo_rastreio,
                'status_pedido' => $this->status_pedido,
                'valor_total_perso' => $this->valor_total_perso
            ]);
        } else {
            return $db->update('id_pedido = ' . $id, [
                'codigo_rastreio' => $this->codigo_rastreio,
                'status_pedido' => $this->status_pedido
            ]);
        }
    }


    public static function getPedidosComDetalhes($id_cliente) {

        return (new Database('pedido'))->select_pedido_com_detalhes($id_cliente);
    }


    public static function getPedidosPersonalizadosComDetalhes($id_cliente) {
        $sql = "
            SELECT 
                p.id_pedido,
                p.codigo_rastreio,
                p.status_pedido,
                p.data_pedido,
                pr.tipo AS nome_produto,
                pr.descricao AS descricao_personalizada,
                ip.imagem1,
                ip.imagem2,
                ip.imagem3,
                ip.imagem4,
                p.valor_total_perso AS preco,
                NULL AS cor,
                NULL AS altura,
                1 AS quant_produto
            FROM pedido p
            JOIN produto_perso pr ON p.produto_perso_id_produto_perso = pr.id_produto_perso
            LEFT JOIN imagens_produto_perso ip ON pr.id_produto_perso = ip.id_produto_perso
            WHERE p.id_cliente = :id_cliente
            AND p.tipo = 'personalizado'
            ORDER BY p.data_pedido DESC
        ";
    
        $db = new Database();
        $stmt = $db->execute($sql, [':id_cliente' => $id_cliente]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    
    
    
    
}
?>
