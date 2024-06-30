<?php

    //UTILIZADO PARA SELECIONAR O MENU NO HOME PAGE
    $url = [];

    if(strrpos($_SERVER['REQUEST_URI'], "dashboard")>0) {
        $url = ["active","","","",""];
    }
    else if(strrpos($_SERVER['REQUEST_URI'], "destaques")>0) {
        $url = ["","active","","","",""];
    } 
    else if(strrpos($_SERVER['REQUEST_URI'], "produtos")>0) {
        $url = ["","","active","","",""];
    } 
    else if(strrpos($_SERVER['REQUEST_URI'], "pedido")>0) {
        $url = ["","","","active","",""];
    } 
    else if(strrpos($_SERVER['REQUEST_URI'], "fornecedores")>0) {
        $url = ["","","","","active",""];
    } 
    else if(strrpos($_SERVER['REQUEST_URI'], "usuarios")>0) {
        $url = ["","","","","","active"];
    }
    
?>

<div class="sidebar">
    <!--div class="quickmenu">
        <div class="quickmenu__cont">
            <div class="quickmenu__list">
            <div class="quickmenu__item active"><div class="fa fa-fw fa-home"></div></div>
            </div>
        </div>
    </div-->
    <div class="scrollable scrollbar-macosx">
        <div class="sidebar__cont">
            <div class="sidebar__menu">

                <!--div class="sidebar__title">MENUS</div-->
                <ul class="nav nav-menu">
                    <li class="<?php echo $url[0]; ?>"><a href="./dashboard">
                        <div class="nav-menu__ico"><i class="fa fa-fw fa-star"></i></div>
                        <div class="nav-menu__text"><span>Dashboard</span></div></a>
                    </li>
                    <li class="<?php echo $url[1]; ?>"><a href="#">
                        <div class="nav-menu__ico"><i class="fa fa-fw fa-star"></i></div>
                        <div class="nav-menu__text"><span>Destaques</span></div>
                        <div class="nav-menu__right"><i class="fa fa-fw fa-angle-right arrow"></i></div></a>
                        <ul class="nav nav-menu__second collapse" aria-expanded="false" style="height: 0px;">
                            <li><a href="./destaques-insert">Cadastrar</a></li>
                            <li><a href="./destaques">Listar</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo $url[2]; ?>"><a href="#">
                        <div class="nav-menu__ico"><i class="fa fa-fw fa-cube"></i></div>
                        <div class="nav-menu__text"><span>Produtos</span></div>
                        <div class="nav-menu__right"><i class="fa fa-fw fa-angle-right arrow"></i></div></a>
                        <ul class="nav nav-menu__second collapse" aria-expanded="false" style="height: 0px;">
                            <li><a href="./categorias-insert">Cadastrar Categorias</a></li>
                            <li><a href="./produtos-insert">Cadastrar Produtos</a></li>
                            <li><a href="./categorias">Listar Categorias</a></li>
                            <li><a href="./produtos">Listar Produtos</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo $url[3]; ?>"><a href="#">
                        <div class="nav-menu__ico"><i class="fa fa-fw fa-truck"></i></div>
                        <div class="nav-menu__text"><span>Pedidos</span></div>
                        <div class="nav-menu__right"><i class="badge badge-default">2</i></div></a>
                        <ul class="nav nav-menu__second collapse" aria-expanded="false" style="height: 0px;">
                            <li><a href="./pedidos-insert">Cadastrar</a></li>
                            <li><a href="./pedidos">Listar</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo $url[4]; ?>"><a href="#">
                        <div class="nav-menu__ico"><i class="fa fa-fw fa-user"></i></div>
                        <div class="nav-menu__text"><span>Fornecedores</span></div>
                        <div class="nav-menu__right"><i class="fa fa-fw fa-angle-right arrow"></i></div></a>
                        <ul class="nav nav-menu__second collapse" aria-expanded="false" style="height: 0px;">
                            <li><a href="./fornecedores-insert">Cadastrar</a></li>
                            <li><a href="./fornecedores">Listar</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo $url[5]; ?>"><a href="#">
                        <div class="nav-menu__ico"><i class="fa fa-fw fa-user"></i></div>
                        <div class="nav-menu__text"><span>Usuários</span></div>
                        <div class="nav-menu__right"><i class="fa fa-fw fa-angle-right arrow"></i></div></a>
                        <ul class="nav nav-menu__second collapse" aria-expanded="false" style="height: 0px;">
                            <li><a href="./usuarios-insert">Cadastrar</a></li>
                            <li><a href="./usuarios">Listar</a></li>
                        </ul>
                    </li>
                </ul>
            
            </div>
        </div>
    </div>
</div>