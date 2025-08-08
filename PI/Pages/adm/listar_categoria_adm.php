<?php

include "nav_bar_adm.php";

?>
<body >    
    <main class="main_adm">
        <div class="conatiner_dashbord_adm">
            <div class="Title_deafult_adm">
                <div class="container_title_adm_left">
                    <span class="title_adm">Categorias</span>
                </div>
                <div class="container_title_adm_right">
                <a style="text-decoration:none;" href="cadastrar_categoria_adm.php"><button class="btn_add_item_adm">+ Categoria</button></a>
                </div>
                
            </div>
            <div class="conatiner_cont_dados_adm">
                <div class="card_item_dados">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <div class="item_dados_adm">
                        <p class="n_item_dados n_item_dados_categoria" data-status="todos"></p>
                        <p class="text_item_dados">Total de Categorias</p>
                    </div>
                </div>
                <div class="shape_dados"></div>
                <div class="card_item_dados">
                    <i class="fa-solid fa-check"></i>
                    <div class="item_dados_adm">
                        <p class="n_item_dados n_item_dados_categoria" data-status="ativos"></p>
                        <p class="text_item_dados">Total Ativos</p>
                    </div>
                </div>
                <div class="shape_dados"></div>
                <div class="card_item_dados">
                    <i class="fa-solid fa-circle-xmark"></i>
                    <div class="item_dados_adm">
                        <p class="n_item_dados n_item_dados_categoria" data-status="inativos"></p>
                        <p class="text_item_dados">Total Inativos</p>
                    </div>
                </div>
            </div>
            <div class="conatiner_listar_adm">
                <div class="container_listar_header_adm">
                    <div class="container_listar_header_adm_left">
                        <button class="btn_item_listar_adm btn_item_listar_categorias" id="btn_todos" data-status='todos'>Todos</button>
                        <button class="btn_item_listar_adm btn_item_listar_categorias" id="btn_ativos" data-status='ativos'>Ativo</button>
                        <button class="btn_item_listar_adm btn_item_listar_categorias" id="btn_inativos" data-status='inativos'>Inativo</button>

                    </div>
                    <div class="container_listar_header_adm_right">
                        <input id="input_search" placeholder="Pesquisar categorias" type="search" name="" id="">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    

                </div>
                <!-- <script src="../../src/JS/load_table_categorias.php" defer></script> -->
                <div class="container_listar_body_adm" style = "overflow: auto;">
                    <table class="table_adm_list" >
                        <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="dados_categoria">
                            <!-- Dados dinâmicos serão inseridos aqui via JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </main>
</body>
</html>