<?php
require_once(__DIR__ . '/../DB/Database.php');


class Produto{
    public int $id_produto;
    public string $nome;
    public float $preco;
    public ?string $avaliacao;
    public int $quantidade;
    public string $cor;
    public float $largura;
    public float $altura;
    public string $imagem;
    public string $descricao;
    public string $tipo;
    public string $status_produto;
    public int $categoria_id_categoria;

    public function cadastrarProduto(){
        $db = new Database('produto');
        $result = $db->insert(
            [
                'nome' => $this->nome,
                'preco' => $this->preco,
                'avaliacao' => $this->avaliacao,
                'quantidade' => $this->quantidade,
                'cor' => $this->cor,
                'largura' => $this->largura,
                'altura' => $this->altura,
                'imagem' => $this->imagem,
                'descricao' => $this->descricao,
                'tipo' => $this->tipo,
                'status_produto' => $this->status_produto,
                'categoria_id_categoria' => $this->categoria_id_categoria
            ]
        );

        return $result;
    }

    public function atualizarProduto($id) {
        $db = new Database('produto');

        // Verifica se já existe imagem no banco
        $produtoAntigo = (new Database('produto'))->select('id_produto = ' . $id)->fetch(PDO::FETCH_ASSOC);

        $imagemFinal = $this->imagem;

        // Se a imagem nova for diferente da anterior, atualiza
        if (!empty($this->imagem) && $this->imagem !== $produtoAntigo['imagem']) {
            $imagemFinal = $this->imagem;
        } else {
            $imagemFinal = $produtoAntigo['imagem'];
        }

        $dados = [
            'nome' => $this->nome,
            'preco' => $this->preco,
            'avaliacao' => $this->avaliacao,
            'quantidade' => $this->quantidade,
            'cor' => $this->cor,
            'altura' => $this->altura,
            'largura' => $this->largura,
            'imagem' => $imagemFinal,
            'descricao' => $this->descricao,
            'tipo' => $this->tipo,
            'status_produto' => $this->status_produto,
            'categoria_id_categoria' => $this->categoria_id_categoria
        ];

        return $db->update('id_produto = ' . $id, $dados);
    }



    public static function buscarProdutoPorId($where=null, $order =null, $limit = null){
        return (new Database('produto'))->select('id_produto = "'. $where .'"')->fetchObject(self::class);

    }

    public static function buscarProdutoPorIdEstrelas($id_produto){

          return (new Database('produto'))->selectProdutoIdEstrela($id_produto);
    }

    public static function buscarProduto($where=null, $order =null, $limit = null){

        return (new Database('produto'))->select($where,$order,$limit)
                                        ->fetchAll(PDO::FETCH_CLASS,self::class);

    }

    public static function buscarProdutoCategoriaNota($id_categoria){
        
        return (new Database('produto'))->select_Produto_Categoria_Nota($id_categoria);
    }


    public static function buscarProdutoCategoria($categoria){

        return (new Database('produto'))->select_produto_por_categoria($categoria);

    
    }
    
    public static function buscarProdutoAleatorio(){

        return (new Database('produto'))->select_produto_por_aleatorio();

    
    }
    public static function buscarProdutoCart($ids){

        return (new Database('produto'))->select_buscar_produto_cart($ids);

    
    }

    public function buscarProdutoMaisVendido(){
        return (new Database('produto'))->buscarProdutosMaisVendidos();
    }

    
    public function buscarProdutosPorNota($nota, $categoria){

        return (new Database('produto'))->selectProdutosPorNota($nota, $categoria);

    
    }

   
    
}