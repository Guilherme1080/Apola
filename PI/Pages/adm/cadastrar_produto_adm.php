<?php
include "nav_bar_adm.php";

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
$errImg = ""; // Novo erro para a imagem

if (isset($_POST['carregarDadosProduto'])) {
    $titulo = $_POST['tituloProduto'];
    $status = $_POST['selectStatus'];
    $categoria = $_POST['selectCategoria'];
    $descricao = $_POST['descricaoProduto'];
    $cor = $_POST['corProduto'];
    $altura = $_POST['alturaProduto'];
    $largura = $_POST['larguraProduto'];
    $estoque = $_POST['estoqueProduto'];
    $preco = $_POST['precoProduto'];

    if (empty($titulo)) $errTitulo = "Adicione um título";
    if (empty($status)) $errStatus = "Escolha o status";
    if (empty($categoria)) $errCategoria = "Escolha uma categoria";
    if (empty($descricao)) $errDescricao = "Adicione uma descrição";
    if (empty($cor)) $errCor = "Adicione uma cor";
    if (empty($altura)) $errAltura = "Adicione uma altura";
    if (empty($largura)) $errLargura = "Adicione uma largura";
    if (empty($estoque)) $errEstoque = "Adicione um estoque";
    if (empty($preco)) $errPreco = "Adicione um preço";

    // Tratamento da imagem
    if (isset($_FILES['imagemProduto']) && $_FILES['imagemProduto']['error'] === UPLOAD_ERR_OK) {
        $extensoesPermitidas = ['png', 'jpg', 'jpeg', 'jfif'];
        $pastaDestino = '../../src/imagens/produtos/';

        $imagem = $_FILES['imagemProduto'];
        $nomeOriginal = $imagem['name'];
        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoesPermitidas)) {
            $errImg = "A extensão do arquivo \"$nomeOriginal\" não é permitida.";
        } else {
            $novoNome = uniqid('ImagemProduto_', true) . '.' . $extensao;
            $caminhoFinal = $pastaDestino . $novoNome;

            if (!move_uploaded_file($imagem['tmp_name'], $caminhoFinal)) {
                $errImg = "Falha ao mover a imagem para o destino.";
            }
        }
    } else {
        $errImg = "Insira uma imagem.";
    }

    // Verifica se há algum erro
    if (
        empty($errTitulo) && empty($errStatus) && empty($errCategoria) &&
        empty($errDescricao) && empty($errImagem) && empty($errPreco) &&
        empty($errCor) && empty($errAltura) && empty($errLargura) &&
        empty($errEstoque) && empty($errImg)
    ) {
        // Tudo certo, cadastrar produto
        $produto = new Produto();
        $produto->nome = $titulo;
        $produto->preco = $preco;
        $produto->avaliacao = "";
        $produto->quantidade = $estoque;
        $produto->cor = $cor;
        $produto->altura = $altura;
        $produto->largura = $largura;

        // Salva caminho relativo no banco
        $produto->imagem = 'src/imagens/produtos/' . $novoNome;

        $produto->descricao = $descricao;
        $produto->tipo = "Da loja";
        $produto->status_produto = $status;
        $produto->categoria_id_categoria = $categoria;

        $resultado = $produto->cadastrarProduto();

        if ($resultado) {
            $mostrarModal = true;
            echo '<meta http-equiv="refresh" content="1.9">';
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: 'Não foi possível cadastrar o produto.',
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
                    <span class="title_adm">Novo Produto</span>
                </div>
            </div>
            <div class="conatiner_cadastro_adm_items">
                <div class="conatiner_cadastro_adm_items_header">
                    <div class="conatiner_cadastro_adm_items_header_left">
                        <div class="item_flex_adm">
                            <label for="">Titulo</label>
                            <input type="text" name="tituloProduto">
                            <p class="text_tamanho_img" style="color:red;"> <?= $errTitulo; ?> </p>
                        </div>
                        <div class="item_flex_adm">
                            <label for="">Status</label>
                            <select name="selectStatus" id="">
                                <option value="ativo">Ativo</option>
                                <option value="inativo">Inativo</option>
                            </select>
                            <p class="text_tamanho_img" style="color:red;"> <?= $errStatus; ?> </p>
                        </div>
                        <div class="item_flex_adm">
                            <label for="">Categoria</label>
                            <select name="selectCategoria" id="dadosTodasCategoria">
                                <!-- opções preenchidas via JS, mantenha assim -->
                            </select>
                            <p class="text_tamanho_img" style="color:red;"> <?= $errCategoria; ?> </p>
                        </div>
                        <div class="item_flex_adm">
                            <label for="">Descrição</label>
                            <textarea name="descricaoProduto" id=""></textarea>
                            <p class="text_tamanho_img" style="color:red;"> <?= $errDescricao; ?> </p>
                        </div>
                    </div>
                    <div class="conatiner_img_add_adm add_img_categoria">
                        <input type="file" name="imagemProduto" id="imgInput" class="imagemCategoria" accept="image/*" style="display:none;">
                        <label for="imgInput" style="cursor:pointer; user-select:none;">+ Adicionar Imagem</label>
                        <img class="imagemCategoria-active" id="preview_img" src="" alt="Preview da imagem" style="display:none; max-width: 150px; margin-top: 10px;">
                    </div>
                </div>
                <div class="conatiner_cadastro_adm_items_body">
                    <div class="conatiner_cadastro_adm_items_body_add">
                        <div class="item_flex_adm">
                            <label for="">Preço</label>
                            <input type="text" name="precoProduto" class="input_adcionar_produto">
                            <p class="text_tamanho_img" style="color:red;"> <?= $errPreco; ?> </p>
                        </div>
                        <div class="item_flex_adm">
                            <label for="">Adicionar Cor</label>
                            <input type="color" name="corProduto" class="input_adcionar_produto" >
                            <p class="text_tamanho_img" style="color:red;"> <?= $errCor; ?> </p>
                        </div>
                        <div class="item_flex_adm">
                            <label for="">Adicionar Altura</label>
                            <input name="alturaProduto" placeholder="cm" class="input_adcionar_produto" type="text">
                            <p class="text_tamanho_img" style="color:red;"> <?= $errAltura; ?> </p>
                        </div> 
                        <div class="item_flex_adm">
                            <label for="">Adicionar Largura</label>
                            <input name="larguraProduto" placeholder="cm"class="input_adcionar_produto" type="text">
                            <p class="text_tamanho_img" style="color:red;"> <?= $errLargura; ?> </p>
                        </div>
                    </div>
                    <div class="conatiner_cadastro_adm_items_body_2">
                        <div class="item_flex_adm2">
                            <label for="">Adicionar Estoque</label>
                            <input name="estoqueProduto" class="input_adcionar_produto" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div id="conatiner_btn_adm_pc"  class="conatiner_btn_adm">
                <button type="submit" name="carregarDadosProduto" class="btn_salvar_adm">Salvar</button>
            </div>
            <div id="modalSucesso" class="modal-sucesso">
                <div class="modal-conteudo">
                    <span class="fechar" onclick="fecharModal()">&times;</span>
                    <p><strong>✔ Sucesso!</strong> A operação foi realizada corretamente.</p>
                </div>
            </div>     
        </form>   
    </main>

<script>
    // Função para mostrar preview da imagem selecionada
    document.getElementById('imgInput').addEventListener('change', function(event) {
        const preview = document.getElementById('preview_img');
        const file = event.target.files[0];

        if(file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    });

function mostrarModal() {
    const modal = document.getElementById("modalSucesso");
    modal.style.display = "block";

    setTimeout(() => {
        modal.style.display = "none";
    }, 1900);
}

function fecharModal() {
    document.getElementById("modalSucesso").style.display = "none";
}
</script>

<!-- PHP ativa o modal se operação for bem-sucedida -->
<?php if (isset($mostrarModal) && $mostrarModal === true): ?>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.onload = function() {
            mostrarModal();

            Swal.fire({
                icon: 'success',
                title: 'Cadastrado com Sucesso',
                showConfirmButton: false,
                timer: 1000
            });
        };
    </script>
<?php endif; ?>

</body>
</html>
