<main>
    <div class="listar_produtos">
        <div class="container_header_listar_produtos">
            <div class="title_continer_cadastrar_produto_adm">
                <a href=""><i class="fa-solid fa-chevron-left"></i></a>
                <h6 class="title_adm_default">Categorias</h6>
            </div>
            <button class="btn_criar_prod_adm_listar">+ Categoria</button>
        </div>
        <div class="container_body_listar_produtos">
            <div class="container_body_listar_produtos_header">
                <div class="container_btn_item_listar_produto">,
                    <button class=" btn_item_listar_produto">Todos</button>
                    <button class="btn_item_listar_produto">Ativo</button>
                    <button class="btn_item_listar_produto">Inativo</button>
                </div>
                <div class="conatiner_search_listar_produto">
                    <input placeholder="Pesquisar produto" type="search" name="" id="">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <button class="btn_search_listar_produto">Buscar</button>
                </div>
                <script>

                    // Seleciona todos os botões pela classe
                    const buttons = document.querySelectorAll('.btn_item_listar_produto');

                    // Adiciona o evento de clique a cada botão
                    buttons.forEach(button => {
                        button.addEventListener('click', () => {
                            console.log(`Botão "${button.textContent}" clicado`);

                            // Remove os estilos dos outros botões
                            buttons.forEach(btn => {
                                btn.style.backgroundColor = '';
                                btn.style.color = '';
                            });

                            // Adiciona os estilos ao botão clicado
                            button.style.backgroundColor = '#FA301E';
                            button.style.color = '#ffffff';
                        });
                    });

                </script>
                
            </div>
            <div class="container_body_listar_produtos_body">
                <table>
                    <tr>
                        <th>
                            Titulo
                        </th>
                        <th>
                            Qut. Produtos
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Editar
                        </th>
                    </tr>
                    <tr>
                        <td class="container_listar_check">
                            <input type="checkbox" name="" id="">
                            Cachepô
                        </td>
                        <td>
                            16
                        </td>
                        <td>
                            <div class="shape_status_produtos"></div>
                        </td>
                        <td>
                            <i class="fa-solid fa-eye"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="container_listar_check">
                            <input type="checkbox" name="" id="">
                            Cachepô
                        </td>
                        <td>
                            16
                        </td>
                        <td>
                            <div class="shape_status_produtos"></div>
                        </td>
                        <td>
                            <i class="fa-solid fa-eye"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="container_listar_check">
                            <input type="checkbox" name="" id="">
                            Cachepô
                        </td>
                        <td>
                            16
                        </td>
                        <td>
                            <div class="shape_status_produtos"></div>
                        </td>
                        <td>
                            <i class="fa-solid fa-eye"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="container_listar_check">
                            <input type="checkbox" name="" id="">
                            Cachepô
                        </td>
                        <td>
                            16
                        </td>
                        <td>
                            <div class="shape_status_produtos"></div>
                        </td>
                        <td>
                            <i class="fa-solid fa-eye"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="container_listar_check">
                            <input type="checkbox" name="" id="">
                            Cachepô
                        </td>
                        <td>
                            16
                        </td>
                        <td>
                            <div class="shape_status_produtos"></div>
                        </td>
                        <td>
                            <i class="fa-solid fa-eye"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="container_listar_check">
                            <input type="checkbox" name="" id="">
                            Cachepô
                        </td>
                        <td>
                            16
                        </td>
                        <td>
                            <div class="shape_status_produtos"></div>
                        </td>
                        <td>
                            <i class="fa-solid fa-eye"></i>
                        </td>
                    </tr>

                </table>

            </div>
            
        </div>
    </div>
</main>
