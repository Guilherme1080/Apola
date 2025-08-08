<?php

include "head_adm.php";
require_once '../../App/config.inc.php';
require_once '../../App/Session/Login.php';
$result = Login::IsLogedAdm();
if($result){
    $id_administrador = $_SESSION['administrador']['id_administrador'];
}
else{
    header('location: ../user/login.php');
}

// print_r($result)
// include "nav_bar_adm.php";
?>
<header class="header_adm" >
        <nav class="navbar_adm" id="sidebar_adm">
            <div id="sidebar_adm_content">
                <!-- <div class="logo_sidebar">
                    <img  id="logo_adm" src="OIP.jpeg" alt="">
                </div> -->
                <ul id="side_bar_itens">
                    <li class="side_bar-itens">
                        <a style="text-decoration:none;" href="perfil_adm.php">
                            <i class="fa-solid fa-user-tie"></i>
                            <span class="text_side_item">Perfil</span>
                        </a>
                    </li>
                    <li class="side_bar-itens">
                        <a style="text-decoration:none;" href="dashbord_adm.php">
                            <i class="fa-solid fa-chart-simple"></i>
                            <span class="text_side_item">Dashbord</span>
                        </a>
                    </li>
                    <li class="side_bar-itens">
                        <a style="text-decoration:none; " href="listar_pedidos_adm.php">
                            <i class="fa-solid fa-truck"></i>
                            <span class="text_side_item">Pedidos</span>
                        </a>
                    </li>
                    <li class="side_bar-itens">
                        <a style="text-decoration:none; " href="listar_produtos_adm.php">
                            <i class="fa-solid fa-box"></i>
                            <span class="text_side_item">Produtos</span>
                        </a>
                    </li>
                    <li class="side_bar-itens">
                        <a style="text-decoration:none;" href="listar_categoria_adm.php">
                            <i class="fa-solid fa-boxes-stacked"></i>
                            <span class="text_side_item">Categorias</span>
                        </a>
                    </li>
                    <li class="side_bar-itens">
                        <a style="text-decoration:none;" href="cadastrar_banner_adm.php">
                            <i class="fa-solid fa-bookmark"></i>
                            <span class="text_side_item">Banners</span>
                        </a>
                    </li>
                </ul>
        
                <button id="open_btn_adm">
                    <i id="open_btn_icon_adm" class="fa-solid fa-chevron-right"></i>
                </button>
    
            </div>
    
            <div id="logout_adm">
                <button class="side_bar-itens btn_logout_adm">
                    <a href="../user/home.php">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <span class="text_side_item">Sair</span>
                    </a>
                </button>
            </div>
            
    
        </nav>
        <nav class="nav_mobile_adm">
            <div class="nav_bar_content_mobile_adm">
                <ul>
                    <li>
                        <a href="perfil_adm.php"><i class="fa-solid fa-user-tie"></i></a>
                    </li>
                    <li>
                        <a href="dashbord_adm.php"><i class="fa-solid fa-chart-simple"></i></a>
                    </li>
                    <li>
                        <a href="listar_pedidos_adm.php"><i class="fa-solid fa-truck"></i></a>
                    </li>
                    <li>
                        <a href="listar_produtos_adm.php"><i class="fa-solid fa-box"></i></a>
                    </li>
                    <li>
                        <a href="listar_categoria_adm.php"><i class="fa-solid fa-boxes-stacked"></i></a>
                    </li>
                    <li>
                        <a href="cadastrar_banner_adm.php"><i class="fa-solid fa-bookmark"></i></a>
                    </li>
                    <li>
                        <a href="../user/home.php"><i class="fa-solid fa-right-to-bracket"></i></a>
                    </li>
                </ul>    
            </div>
        </nav>

</header>
    