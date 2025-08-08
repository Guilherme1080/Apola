<?php

require '../../App/config.inc.php';
require '../../App/Session/Login.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require __DIR__ . '/../../../vendor/autoload.php';

session_start();
$id_cliente = $_SESSION['cliente']['id_cliente'] ?? null;


$cliente = Cliente::getClienteById($id_cliente);
$usuario = User::getUsuarioById($cliente['id_usuario']);



header('Content-Type: application/json');

function gerarCodigo($tamanho = 8) {
    $caracteres = '0123456789';
    $codigo = '';
    for ($i = 0; $i < $tamanho; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $codigo;
}

$dados = json_decode(file_get_contents('php://input'), true);

if (!$dados || !isset($dados['cartFinal']) || !isset($dados['endereco'])) {
    echo json_encode([
        'status' => 'erro',
        'mensagem' => 'Dados incompletos.'
    ]);
    exit;
}

$cart = $dados['cartFinal'];
$endereco = $dados['endereco'];

preg_match('/CEP:\s*([\d]{5}-?[\d]{3})/', $endereco, $matches);
$cepSemHifen = null;
if (isset($matches[1])) {
    $cepSemHifen = str_replace('-', '', $matches[1]);
} else {
    $cepSemHifen = null;
}


$valorFrete = 15.65;
$valorTotal = 0;
$sucesso = true;
$id_sacola = gerarCodigo();



$pedido = new Pedido();


$pedido->data_pedido = date('Y-m-d H:i:s');
$pedido->tipo = 'disponivel';
$pedido->status_pedido = 'A pagar';
$pedido->codigo_rastreio = null;
$pedido->id_cliente = $id_cliente;


$LastIdPedido = $pedido->cadastrar();



foreach ($cart as $produto) {

    $sacola = new Sacola();

    $produtoDetalhes = Produto::buscarProdutoPorId($produto['id_produto']);

    if (!$produtoDetalhes) {
        $sucesso = false;
        break;
    }

    $sacola->preco_frete = $valorFrete;
    $sacola->valor_total = $produtoDetalhes->preco * $produto['quantidade']; 
    $sacola->cep = $cepSemHifen ?? 0;
    $sacola->quant_produto = $produto['quantidade'];
    $sacola->produto_id_produto = $produtoDetalhes->id_produto;
    $sacola->cliente_id_cliente = $id_cliente;
    $sacola->pedido_id_pedido  = $LastIdPedido;

    $inseriu = $sacola->cadastrar();

    if (!$inseriu) {
        $sucesso = false;
        break; 
    }

    $valorTotal += $sacola->valor_total;
}




$mail = new PHPMailer(true); 

try {
    // Config PHPMailer
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'apolasuporte@gmail.com';
    $mail->Password   = 'teugmoawafflqgkf';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('apolasuporte@gmail.com', 'E.T Artesanatos');
    $mail->addAddress($usuario->email, $usuario->nome);

    $mail->isHTML(true);
    $mail->Subject = "Pedido de #{$LastIdPedido} aprovado";
    $mail->Body = "
        <h2>Olá, {$usuario->nome}!</h2>
        <p>Recebemos seu pedido <strong>#{$LastIdPedido}</strong> com sucesso.</p>
        <p>Estamos preparando tudo com carinho e em breve você receberá mais atualizações sobre o envio.</p>
        <p>Qualquer dúvida, entre em contato conosco.</p>
        <br>
        <p>Atenciosamente,</p>
        <p><strong>Apola Artesanatos</strong></p>
    ";
    $mail->AltBody = "Olá, {$usuario->nome}!\n\nRecebemos seu pedido #{$LastIdPedido} com sucesso.\n\nE.T Artesanatos";

    $mail->send();
    $sucesso = true;

} catch (Exception $e) {
    echo json_encode([
        'status' => 'erro',
        'mensagem' => 'Erro ao tentar enviar o e-mail: ' . $mail->ErrorInfo
    ]);
    exit;
}

if ($sucesso) {
    echo json_encode([
        'status' => true,
        'mensagem' => 'Pedido cadastrado e e-mail enviado com sucesso!',
        'valor_total' => number_format($valorTotal + $valorFrete, 2, ',', '.')
    ]);
} else {
    echo json_encode([
        'status' => 'erro',
        'mensagem' => 'Erro ao cadastrar pedido ou enviar e-mail.'
    ]);
}