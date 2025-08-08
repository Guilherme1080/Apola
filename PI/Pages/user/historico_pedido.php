<?php

include "head.php";
include "navbar_logado.php";
require_once '../../App/Entity/Pedido.class.php';
require_once '../../App/Session/Login.php';

if (!Login::IsLogedCliente()) {
    header('Location: login.php');
    exit;
}

$id_cliente = $_SESSION['cliente']['id_cliente'];
$pedidos_normais = Pedido::getPedidosComDetalhes($id_cliente);


$pedidos_personalizados = Pedido::getPedidosPersonalizadosComDetalhes($id_cliente);

// Junta os dois arrays
$pedidos = array_merge($pedidos_normais, $pedidos_personalizados);


// Opcional: ordenar por data_pedido decrescente para ficar organizado
usort($pedidos, function($a, $b) {
    return strtotime($b['data_pedido']) <=> strtotime($a['data_pedido']);
});

?>

<main class="main2">
    <section class="container_favortos">
        <div class="left-container_favoritos">
            <div class="container_favoritos_left">
                <div class="title_left_favoritos">Meu Perfil</div>
                <ul>
                    <li class="item_favorito_left">
                        <i class="fa-solid icon_favorito_content  fa-house"></i><a class="link_favorito_left" href="./perfil.php">Conta</a>
                    </li>
                    <li class="item_favorito_left">
                        <i class="fa-solid icon_favorito_content fa-heart"></i><a class="link_favorito_left" href="./Favoritos.php">Favoritos</a>
                    </li>
                    <li class="item_favorito_left">
                        <i class="fa-solid  icon_favorito_content fa-boxes-stacked"></i><a class="link_favorito_left" href="./historico_pedido.php">Histórico de Pedidos</a>
                    </li>
                    <li class="item_favorito_left">
                        <i class="fa-solid fa-pencil icon_favorito_content"></i><a class="link_favorito_left" href="./alterar_perfil.php">Alterar Perfil</a>
                    </li>
                    <li class="item_favorito_left">
                        <i class="fa-solid fa-right-from-bracket"></i><a class="link_favorito_left" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="right_container_favoritos">
            <div class="container_historico_pedido">
                <div class="container_btn_historico_pedidos">
                    <div class="btn_pedidos_historico hp">Pedidos</div>
                    <div class="btn_pedidos_historico">Recebidos</div>
                </div>

                <div class="conatiner_gap_body_cart">
                <?php foreach ($pedidos as $pedido): ?>
                    <div class="container_body_cart" data-status="<?= $pedido['status_pedido'] ?>">
                        <ul class="conatiner_list_item_cart">
                            <li>Produto</li>
                            <li>Preço</li>
                            <li>Quantidade</li>
                        </ul>
                        <div class="shape_sacola"></div>
                        <ul class="produto_list_cart">
                            <li class="produto_item_cart-1">
                                <div class="produto_item_cart_left">
                                    <div class="container_img_produto_cart">
                                        <?php if (!empty($pedido['imagem'])): ?>
                                            <img src="../../src/imagens/card_produto/<?= $pedido['imagem'] ?>" alt="">
                                        <?php elseif (!empty($pedido['imagem1'])): ?>
                                            <img src="../../src/imagens/personalizados/<?= $pedido['imagem1'] ?>" alt="">
                                        <?php else: ?>
                                            <img src="../../src/imagens/default.png" alt="Sem imagem">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="produto_item_cart_right">
                                    <h6 class="name_produto_cart">
                                        <?= htmlspecialchars($pedido['nome_produto'] ?? $pedido['tipo']) ?>
                                    </h6>
                                    <h6 class="detalhes_produto_cart">
                                        <?php if (!empty($pedido['cor'])): ?>
                                            <div class="cor_produto_cart">Cor - <?= htmlspecialchars($pedido['cor']) ?> //</div>
                                            <div class="tamanho_produto_cart">Altura - <?= htmlspecialchars($pedido['altura']) ?> cm</div>
                                        <?php elseif (!empty($pedido['descricao_personalizada'])): ?>
                                            <div class="descricao_perso"><?= nl2br(htmlspecialchars($pedido['descricao_personalizada'])) ?></div>
                                        <?php endif; ?>
                                    </h6>
                                    <h6 class="detalhes_produto_cart_mobile">
                                        <h6 class="preco_produto_cart"><?= number_format($pedido['preco'], 2, ',', '.') ?> R$</h6>
                                    </h6>
                                </div>
                            </li>
                            <li class="produto_item_cart-2">
                                <h6 class="preco_produto_cart"><?= number_format($pedido['preco'], 2, ',', '.') ?> R$</h6>
                            </li>
                            <li class="produto_item_cart-3">
                                <div class="text_quant_mobile_hist">Qut.</div>
                                <h6 class="preco_produto_cart"><?= $pedido['quant_produto'] ?></h6>
                            </li>
                        </ul>
                            <div class="conatiner_btn_drop">
                                <div class="btn_drop"><i class="fa-solid fa-plus"></i></div>
                            </div>
                            <div class="container_final_cart">
                                <div class="container_final_cart_left">
                                    <ul class="status_shape_hist">
                                        <!-- Produção -->
                                        <li class="<?= in_array($pedido['status_pedido'], ['Produção', 'Envio', 'Entregue']) ? 'active_entrega_shape' : 'item_shape_hist' ?>">
                                            <?php if (in_array($pedido['status_pedido'], ['Produção', 'Envio', 'Entregue'])): ?>
                                                <i class="fa-solid fa-check"></i>
                                            <?php endif; ?>
                                        </li>
                                        <div class="linha_shape_hist"></div>

                                        <!-- A caminho -->
                                        <li class="<?= in_array($pedido['status_pedido'], ['Envio', 'Entregue']) ? 'active_entrega_shape' : 'item_shape_hist' ?>">
                                            <?php if (in_array($pedido['status_pedido'], ['Envio', 'Entregue'])): ?>
                                                <i class="fa-solid fa-check"></i>
                                            <?php endif; ?>
                                        </li>
                                        <div class="linha_shape_hist"></div>

                                        <!-- Entregue -->
                                        <li class="<?= $pedido['status_pedido'] === 'Entregue' ? 'active_entrega_shape' : 'item_shape_hist' ?>">
                                            <?php if ($pedido['status_pedido'] === 'Entregue'): ?>
                                                <i class="fa-solid fa-check"></i>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                    <ul class="name_status_hist">
                                        <li class="item_name_hist">Produção</li>
                                        <li class="item_name_hist">A caminho</li>
                                        <li class="item_name_hist">Entregue</li>
                                    </ul>
                                </div>
                                <div class="container_final_cart_right">
                                    <div class="container_text_preco_final_cart">
                                        <p class="sub_total_text_cart">Sub total</p>
                                        <p class="sub_total_valor_cart">R$ <?= number_format($pedido['preco'] * $pedido['quant_produto'], 2, ',', '.') ?></p>
                                    </div>
                                    <div class="shape_sacola_final"></div>
                                    <div class="container_text_preco_final_cart">
                                        <p class="sub_total_text_cart">Total</p>
                                        <p class="sub_total_valor_cart">R$ <?= number_format($pedido['preco'] * $pedido['quant_produto'], 2, ',', '.') ?></p>
                                    </div>
                                    <div class="shape_sacola_final"></div>
                                    <div class="container_text_preco_final_cart">
                                        <p style="font-weight: 500; color: #4A4A4A;" class="total_text_cart">Cód. Rastreio:</p>
                                        <p style="font-weight: 500; color: #4A4A4A;" class="total_valor_cart"><?= $pedido['codigo_rastreio'] ?></p>
                                    </div>
                                    <div class="shape_sacola_final"></div>
                                    <button data-modal="modal-1" class="btn_final_cart open-modal">Rastrei sua Encomenda</button>
                                </div>
                                <dialog id="modal-1">
                                    <div class="modal_header">
                                        <button class="close-modal" style="outline: none; border:none;" data-modal="modal-1"><i class="fa-solid fa-xmark"></i></button>
                                    </div>
                                    <div class="modal_body">
                                        <h5 class="title_modal_zap">Rastreie sua Ecomenda!</h5>
                                        <div class="text_modal_zap">Segue o link dos correios para verificar o andamento da entrega a partir do código de ratreio do seu pedido.</div>
                                        <div class="conatiner_item_modal_link_zap">
                                            <div class="item_modal_link_zap">
                                                <i class="fa-solid fa-box"></i>
                                                <a target="_blank" href="https://rastreamento.correios.com.br/app/index.php">Acesse os correios</a>
                                            </div>
                                        </div>
                                    </div>
                                </dialog>
                            </div>
                            <div class="shape_sacola"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const btns = document.querySelectorAll('.btn_pedidos_historico');
        const pedidos = document.querySelectorAll('.container_body_cart');

        btns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                btns.forEach(b => b.classList.remove('hp'));
                btn.classList.add('hp');

                pedidos.forEach(pedido => {
                    const status = pedido.getAttribute('data-status');

                    if (index === 0) {
                        // Mostrar todos
                        pedido.style.display = 'block';
                    } else if (index === 1) {
                        // Mostrar apenas os entregues
                        pedido.style.display = status === 'Entregue' ? 'block' : 'none';
                    }
                });
            });
        });
    });
    </script>


</main>

<?php include "footer.php"; ?>