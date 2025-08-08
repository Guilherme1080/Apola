<?php
session_start();

include "nav_bar_adm.php";

require_once '../../App/config.inc.php';
require_once '../../App/Session/Login.php';
require_once '../../App/Entity/Produto.class.php';

$result = Login::IsLogedAdm();
if($result){
    $id_administrador = $_SESSION['administrador']['id_administrador'];
}
else{
    header('location: ../user/login.php');
    exit;
}

$errTitulo = "";
$errStatus = "";
$errCategoria = "";
$errDescricao = "";
$errImagem = "";
$errPreco = "";
$errCor = "";
$errAltura = "";
$errLargura = "";
$errEstoque = "";

if(isset($_GET['id'])){
    $id_produto = $_GET['id'];
} else {
    header('location: listar_produtos_adm.php');
    exit;
}

$produto = Produto::buscarProdutoPorId($id_produto);

if (!$produto) {
    echo "<script>alert('Produto não encontrado!'); window.location.href='listar_produtos_adm.php';</script>";
    exit;
}

if (isset($_POST['carregarDadosProduto'])) {
    $titulo = $_POST['tituloProduto'] ?? '';
    $status = $_POST['selectStatus'] ?? '';
    $categoria = $_POST['selectCategoria'] ?? '';
    $descricao = $_POST['descricaoProduto'] ?? '';
    $cor = $_POST['corProduto'] ?? '';
    $altura = $_POST['alturaProduto'] ?? '';
    $largura = $_POST['larguraProduto'] ?? '';
    $estoque = $_POST['estoqueProduto'] ?? '';
    $preco = $_POST['precoProduto'] ?? '';

    if (empty($titulo)) $errTitulo = "Adicione um título";
    if (empty($status)) $errStatus = "Escolha o status";
    if (empty($categoria)) $errCategoria = "Escolha uma categoria";
    if (empty($descricao)) $errDescricao = "Adicione uma descrição";
    if (empty($cor)) $errCor = "Adicione uma cor";
    if (empty($altura)) $errAltura = "Adicione uma altura";
    if (empty($largura)) $errLargura = "Adicione uma largura";
    if (empty($estoque)) $errEstoque = "Adicione um estoque";
    if (empty($preco)) $errPreco = "Adicione um preço";

    if (empty($errTitulo) && empty($errStatus) && empty($errCategoria) && empty($errDescricao) && empty($errCor) && empty($errAltura) && empty($errLargura) && empty($errEstoque) && empty($errPreco)) {
        
        $imagemNova = false;

        if (isset($_FILES['imagemProduto']) && $_FILES['imagemProduto']['error'] === UPLOAD_ERR_OK && $_FILES['imagemProduto']['size'] > 0) {
            $extensoesPermitidas = ['png', 'jpg', 'jpeg', 'jfif'];
            $pastaDestino = '../../src/imagens/produtos/'; // caminho físico para salvar
            $imagem = $_FILES['imagemProduto'];
            $nomeOriginal = $imagem['name'];
            $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

            if (!in_array($extensao, $extensoesPermitidas)) {
                $errImagem = "A extensão do arquivo \"$nomeOriginal\" não é permitida.";
            } else {
                $novoNome = uniqid('ImagemProduto_', true) . '.' . $extensao;
                $caminhoFisico = $pastaDestino . $novoNome;

                if (move_uploaded_file($imagem['tmp_name'], $caminhoFisico)) {
                    $caminhoBanco = '../../src/imagens/produtos/' . $novoNome; // com ../../ para banco

                    $caminhoAntigo = $produto->imagem; // já tem ../../
                    if (file_exists($caminhoAntigo) && $produto->imagem !== $caminhoBanco) {
                        unlink($caminhoAntigo);
                    }

                    $imagemNova = $caminhoBanco;
                } else {
                    $errImagem = "Falha ao mover a imagem para o destino.";
                }
            }
        }


        if (empty($errImagem)) {
            $entity = new Produto();
            $entity->nome = $titulo;
            $entity->preco = $preco;
            $entity->avaliacao = $produto->avaliacao ?? null;
            $entity->quantidade = $estoque;
            $entity->cor = $cor;
            $entity->altura = $altura;
            $entity->largura = $largura;
            $entity->imagem = $imagemNova ? $imagemNova : $produto->imagem;
            $entity->descricao = $descricao;
            $entity->tipo = "Da loja";
            $entity->status_produto = $status;
            $entity->categoria_id_categoria = $categoria;

            $resultado = $entity->atualizarProduto($id_produto);
            if ($resultado) {
                $produto = Produto::buscarProdutoPorId($id_produto);
                // Adicione essa linha para forçar o navegador a pegar a imagem nova
                $produto->imagem = htmlspecialchars($produto->imagem) . "?t=" . time();
                $mostrarModal = true;
            }

            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: 'Não foi possível atualizar as informações.',
                        confirmButtonColor: '#d33'
                    });
                </script>";
            }
        }
    }
?>

<body>
    <main class="main_adm">
        <form method="POST" enctype="multipart/form-data" class="conatiner_dashbord_adm">
            <div class="Title_deafult_adm">
                <div class="container_title_adm_left">
                    <a href="./listar_produtos_adm.php" style="text-decoration: none; color: #ccc"><i class="fa-solid fa-chevron-left"></i></a>
                    <span class="title_adm">Produto N°<?= htmlspecialchars($id_produto); ?></span>
                </div>
            </div>
            <div class="conatiner_cadastro_adm_items">
                <div class="conatiner_cadastro_adm_items_header">
                    <div class="conatiner_cadastro_adm_items_header_left">
                        <div class="item_flex_adm">
                            <label for="">Titulo</label>
                            <input type="text" name="tituloProduto" value="<?= htmlspecialchars($produto->nome); ?>">
                            <p class="text_tamanho_img" style="color:red;"> <?= $errTitulo; ?> </p>
                        </div>
                        <div class="item_flex_adm">
                            <label for="">Status</label>
                            <select name="selectStatus" id="selectStatus">
                                <?php if($produto->status_produto === "a"): ?>
                                    <option value="a" selected>Ativo</option>
                                    <option value="i">Inativo</option>
                                <?php else: ?>
                                    <option value="a">Ativo</option>
                                    <option value="i" selected>Inativo</option>
                                <?php endif; ?>
                            </select>
                            <p class="text_tamanho_img" style="color:red;"> <?= $errStatus; ?> </p>
                        </div>
                        <div class="item_flex_adm">
                            <label for="">Categoria</label>
                            <script>
                                const categoriaSelecionada = <?= (int)$produto->categoria_id_categoria ?>;
                            </script>
                            <select name="selectCategoria" id="dadosTodasCategoria">
                                <!-- Sua lógica atual para carregar as categorias -->
                            </select>
                            <p class="text_tamanho_img" style="color:red;"> <?= $errCategoria; ?> </p>
                        </div>
                        <div class="item_flex_adm">
                            <label for="">Descrição</label>
                            <textarea name="descricaoProduto"><?= htmlspecialchars($produto->descricao) ?></textarea>
                            <p class="text_tamanho_img" style="color:red;"> <?= $errDescricao; ?> </p>
                        </div>
                    </div>
                    <div class="conatiner_cadastro_adm_items_header_right">
                        <div class="conatiner_img_add_adm add_img_categoria">
                            <label for="imgInput" style="cursor: pointer;">
                                <img class="imagemCategoria-active" src="../../<?= $produto->imagem; ?>" alt="Imagem do Produto" id="preview_img" >
                            <input type="file" name="imagemProduto" id="imgInput" style="display: none;" accept="image/*">
                        </div>
                        <p>Clique na Imagem para Trocar <i class="fa-solid fa-pencil"></i></p>
                        <p style="color: red;"><?= $errImagem;?></p>
                    </div>
                </div>
                <div class="conatiner_cadastro_adm_items_body">
                    <div class="conatiner_cadastro_adm_items_body_add">
                        <div class="item_flex_adm">
                            <label for="">Preço</label>
                            <input type="text" name="precoProduto" class="input_adcionar_produto" value="<?= htmlspecialchars($produto->preco); ?>">
                            <p class="text_tamanho_img" style="color:red;"> <?= $errPreco; ?> </p>
                        </div>
                        <div class="item_flex_adm">
                            <label for="">Adicionar Cor</label>
                            <input name="corProduto" class="input_adcionar_produto" type="color" value="<?= htmlspecialchars($produto->cor); ?>">
                            <p class="text_tamanho_img" style="color:red;"> <?= $errCor; ?> </p>
                        </div>
                        <div class="item_flex_adm">
                            <label for="">Adicionar Altura</label>
                            <input name="alturaProduto" placeholder="cm" class="input_adcionar_produto" type="text" value="<?= htmlspecialchars($produto->altura); ?>">
                            <p class="text_tamanho_img" style="color:red;"> <?= $errAltura; ?> </p>
                        </div>
                        <div class="item_flex_adm">
                            <label for="">Adicionar Largura</label>
                            <input name="larguraProduto" placeholder="cm" class="input_adcionar_produto" type="text" value="<?= htmlspecialchars($produto->largura); ?>">
                            <p class="text_tamanho_img" style="color:red;"> <?= $errLargura; ?> </p>
                        </div>
                    </div>
                    <div class="conatiner_cadastro_adm_items_body_2">
                        <div class="item_flex_adm2">
                            <label for="">Adicionar Estoque</label>
                            <input name="estoqueProduto" class="input_adcionar_produto" type="number" value="<?= htmlspecialchars($produto->quantidade); ?>">
                            <p class="text_tamanho_img" style="color:red;"> <?= $errEstoque; ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="conatiner_btn_adm_pc" class="conatiner_btn_adm">
                <button type="submit" name="carregarDadosProduto" class="btn_salvar_adm">Salvar</button>
            </div>
            <div id="modalSucesso" class="modal-sucesso" style="display:none;">
                <div class="modal-conteudo">
                    <span class="fechar" onclick="fecharModal()">&times;</span>
                    <p><strong>✔ Sucesso!</strong> A operação foi realizada corretamente.</p>
                </div>
            </div>
        </form>
    </main>

<script>
    // Atualiza o preview ao escolher arquivo no input
    document.getElementById('imgInput').addEventListener('change', function(event) {
        const preview = document.getElementById('preview_img');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(file);
        }
    });

    // Função para forçar atualizar a imagem do preview com timestamp para evitar cache
    function atualizarPreviewComCacheBust() {
        const preview = document.getElementById('preview_img');
        let srcOriginal = "<?= htmlspecialchars($produto->imagem); ?>";
        // Adiciona timestamp para forçar recarregar imagem
        preview.src = srcOriginal + "?t=" + new Date().getTime();
    }

    // Mostrar modal e depois atualizar a imagem no preview
    function mostrarModal() {
        const modal = document.getElementById("modalSucesso");
        modal.style.display = "block";

        setTimeout(() => {
            modal.style.display = "none";
            atualizarPreviewComCacheBust(); // Atualiza a imagem logo depois de fechar o modal
        }, 3000);
    }


    function mostrarModal() {
        const modal = document.getElementById("modalSucesso");
        modal.style.display = "block";

        setTimeout(() => {
           modal.style.display = "none";
        }, 3000);
    }

    function fecharModal() {
        document.getElementById("modalSucesso").style.display = "none";
    }
</script>

<?php if (isset($mostrarModal) && $mostrarModal === true): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.onload = function() {
            mostrarModal();

            Swal.fire({
                icon: 'success',
                title: 'Salvo com sucesso!',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                // Força reload da imagem para evitar cache antigo
                const preview = document.getElementById('preview_img');
                const srcAtual = preview.src.split('?')[0];
                preview.src = srcAtual + '?t=' + new Date().getTime();
            });
        };
    </script>
<?php endif; ?>
</body>
</html>
