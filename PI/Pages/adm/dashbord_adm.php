<?php

include "nav_bar_adm.php";

?>


<main class="main_adm" id="main_adm_grafic">
    <div class="conatiner_dashbord_adm">
        <div class="Title_deafult_adm">
            <div class="container_title_adm_left">
                <span class="title_adm">Dashboard</span>
            </div>
            <!-- <div class="container_title_adm_right">
                <input type="text" placeholder="Pesquisar...">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div> -->
        </div>

        <div class="conatiner_dados_dashbord">
            <!-- <div class="cont_dados">
                <div class="metric_card clics">
                    <p>Clicks</p>
                    <p>220</p>
                    <div id="graficoClicks"></div>
                </div>
                <div class="metric_card view">
                    <p>Views</p>
                    <p>140</p>
                    <div id="graficoViews"></div>
                </div>
                <div class="metric_card leads">
                    <p>Leads</p>
                    <p>60</p>
                    <div id="graficoLeads"></div>
                </div>
                <div class="metric_card sale">
                    <p>Sales</p>
                    <p>30</p>
                    <div id="graficoSales"></div> 
                </div>
            </div> -->
            <!-- <div class="grafico_dados">
                <div class="grafico_dados_1">
                    <h2>Vendas (Ano)</h2>
                    <div id="grafico_vendas_anos"></div>
                </div>
                <div class="grafico_dados_2">
                    <h2>Categorias Vendidas (Dia)</h2>
                    <div id="grafico_categorias_vendidas"></div>
                </div>
                <div class="grafico_dados_3">  
                    <h2>Visitas no site</h2>
                    <div id="grafico_entrada_clientes"></div>
                </div>
            </div> -->
            <div class="pesquisa_geral_dados_produtos">
                <div class="grafico_geral_produtos">
                    <h2>Produtos mais Vendidos</h2>
                    <div class="area_grafico">
                        <div id="graficoProdutosVendidos"></div>
                    </div>
                    
                </div>
                <div class="grafico_geral_produtos">
                    <h2>Categorias mais vendidas</h2>
                    <!-- <div class="progress-container" id="progress1"></div>
                    <div class="progress-container" id="progress2"></div>
                    <div class="progress-container" id="progress3"></div>
                    <div class="progress-container" id="progress4"></div> -->
                    <div class="area_grafico">
                        <div id="grafico2"></div>
                    </div>
                    
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        </div>
    
    </div>

</main>

<script src="adm_nav.js"></script>

<script>
</script>
</body>
</html>

