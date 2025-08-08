<?php

include "nav_bar_adm.php";

$err = '';
$errImg = '';

if(isset($_POST['carregarDadosCategoria'])){
    $tituloCategoria = $_POST['tituloCategoria'];
    $status = $_POST['selectStatus'];
    // print_r($status);
    // exit;

    if(empty($tituloCategoria)){
        $err = "Insira um titulo";
    }

    if (isset($_FILES['imagemCategoria']) && $_FILES['imagemCategoria']['error'] === UPLOAD_ERR_OK) {
        $extensoesPermitidas = ['png', 'jpg', 'jpeg', 'jfif'];
        $pastaDestino = '../../src/imagens/categorias/';

        $imagem = $_FILES['imagemCategoria'];
        $nomeOriginal = $imagem['name'];
        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoesPermitidas)) {
            $errImg = "A extensão do arquivo \"$nomeOriginal\" não é permitida.";
        } else {
            $novoNome = uniqid('ImagemCategoria_', true) . '.' . $extensao;
            $caminhoFinal = $pastaDestino . $novoNome;

            if (!move_uploaded_file($imagem['tmp_name'], $caminhoFinal)) {
                $errImg = "Falha ao mover a imagem para o destino.";
            }
        }
    } else {
        $errImg = "Insira uma imagem.";
    }

    if (!empty($err) || !empty($errImg)) {

    } else {
        // Tudo certo, pode cadastrar
        $categoria = new Categoria();
        $categoria->nome = $tituloCategoria;
        $categoria->status_categoria = $status;
        $categoria->imagem = $caminhoFinal;

        $result = $categoria->cadastrarCategoria();

        if($result){
            $mostrarModal = true; // ativa o modal verdinho
            if($mostrarModal == true){
                echo '<meta http-equiv="refresh" content="1.9">'; //
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
                    <a href="./listar_categoria_adm.php" style="text-decoration: none; color: #ccc"><i class="fa-solid fa-chevron-left"></i></a>
                    <span class="title_adm">Nova Categoria</span>
                </div>
                <div class="container_title_adm_right">
                    <!-- <div class="conatiner_btn_adm mobile_btn_salvar">
                        <button class="btn_excluir_adm">Excluir</button>
                        <button class="btn_salvar_adm">Salvar</button>
                    </div> -->
                </div>
                
            </div>
            <div class="conatiner_cadastro_adm_items">
                <div class="conatiner_cadastro_adm_items_header">
                    <div class="conatiner_cadastro_adm_items_header_left">
                        <div class="item_flex_adm">
                            <label for="">Titulo</label>
                            <input type="text" id="tituloCategoria" name="tituloCategoria">
                            <p class="text_tamanho_img" style="color:red;"> <?= $err; ?> </p>
                        </div>
                        <div class="item_flex_adm">
                            <label for="">Status</label>
                            <select name="selectStatus" id="selectStatus">
                                <option value="ativo">Ativo</option>
                                <option value="inativo">Inativo</option>
                            </select>
                        </div>
                        <!-- <div class="item_flex_adm">
                            <label for="">Descrição</label>
                            <textarea name="" id=""></textarea>
                        </div> -->
                        
                    </div>
                    <div class="conatiner_cadastro_adm_items_header_right">
                        <div class="item_flex_adm">
                            <label for="">Imagem</label>
                            <div class="conatiner_img_add_adm add_img_categoria">
                                <input type="file" name="imagemCategoria" id="imgInput" class="imagemCategoria" >
                                <img class= "imagemCategoria-active" id="preview_img" src="" alt="">
                                <p> + Adicionar Imagem</p>  
                            </div>
                            <p class="text_tamanho_img">Tamanho recomendavel (1700x700px)</p>
                            <p class="text_tamanho_img" style="color:red;"> <?= $errImg; ?> </p>
                        </div>

                    </div>
                </div>
                <div class="conatiner_cadastro_adm_items_body">
                    <div class="conatiner_cadastro_adm_items_body_pesquisa">
                        <div class="item_flex_adm">
                            <label for="">Pesquisar Produto</label>
                            <input type="text">
                        </div>
                        <button class="btn_buscar_pesquisa">Buscar</button>
                        <button class="btn_produto_add">+ Produto</button>

                    </div>
                    <div class="conatiner_cadastro_adm_items_body_list">
                        <!-- <table class="table_adm_list">
                            <tr z>
                                <th id="text_alin_item">ID</th>
                                <th id="text_alin_item">produto</th>
                                <th>estoque</th>
                                <th>status</th>
                                <th>ações</th>
                            </tr>
                            <tr>
                                <td id="text_alin_item" >
                                   1
                                </td>
                                <td class="nome_td">
                                    <div class="conatiner_item_list_nome">
                                        <img src="" alt="">
                                        <div class="conatiner_text_nome_list">
                                            <p>Cachepô de Crochê</p>
                                            <span>Lorem ipsum dolor sit amet consectetu.</span>
                                        </div>
                                        
                                    </div>
                                    
                                </td>
                                <td>
                                    16
                                </td>
                                <td>
                                    <div class="container_item_list_status">
                                        <div class="shape_status"></div>
                                        ativo
                                        
                                    </div>
                                </td>
                                <td>
                                    <div class="container_item_list_ações">
                                        <a href=""><i class="fa-solid fa-pencil"></i></a>
                                        <input checked="true" type="checkbox" class="switch">
                                        <a href=""><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td id="text_alin_item" >
                                   1
                                </td>
                                <td class="nome_td">
                                    <div class="conatiner_item_list_nome">
                                        <img src="" alt="">
                                        <div class="conatiner_text_nome_list">
                                            <p>Cachepô de Crochê</p>
                                            <span>Lorem ipsum dolor sit amet consectetu.</span>
                                        </div>
                                        
                                    </div>
                                    
                                </td>
                                <td>
                                    16
                                </td>
                                <td>
                                    <div class="container_item_list_status">
                                        <div class="shape_status"></div>
                                        ativo
                                        
                                    </div>
                                </td>
                                <td>
                                    <div class="container_item_list_ações">
                                        <a href=""><i class="fa-solid fa-pencil"></i></a>
                                        <input checked="true" type="checkbox" class="switch">
                                        <a href=""><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
    
                        </table> -->

                    </div>
                </div>
            </div>
            <div id="conatiner_btn_adm_pc" class="conatiner_btn_adm">
                <!-- <button onclick="window.location.reload()" class="btn_excluir_adm">Excluir</button> -->
                <button type="submit" name="carregarDadosCategoria" class="btn_salvar_adm">Salvar</button>
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
function mostrarModal() {
    const modal = document.getElementById("modalSucesso");
    modal.style.display = "block";

    // Fecha automaticamente após 3 segundos
    setTimeout(() => {
        modal.style.display = "none";
        
    }, 1);
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
        window.onload = function  () {
            // Mostra o modal verdinho simples
            mostrarModal();

            // E também mostra o SweetAlert como reforço visual
            Swal.fire({
                icon: 'success',
                title: 'Cadastrado com Sucesso',
                showConfirmButton: false,
                timer: 1000
            });
        };

    </script>
<?php endif; ?>
    <script src="adm_nav.js"></script>
    <script src="btn_listar_adm.js"></script>
</body>
</html>