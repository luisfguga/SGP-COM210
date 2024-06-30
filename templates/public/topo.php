<?php

    use Ajrc\Helper\Sessions;
    use Ajrc\Helper\FrmLoginTopo;

    //----| TODAS AS CATEGORIAS COM PRODUTOS NO DROPDOWN |----
    $CATEGORIASMENU = null;
    $categorias = Ajrc\Model\Categoria::ListAll("*, (SELECT total FROM vw_total_produtos_por_categoria WHERE tb_categorias_id=tbc.id) as total_produtos ","WHERE (SELECT total FROM vw_total_produtos_por_categoria WHERE tb_categorias_id=tbc.id)>0 ORDER BY titulo ASC" );
    foreach($categorias as $c){
      $CATEGORIASMENU.='<a class="dropdown-item" href="./categoria-'.$c->id.'--'.str_replace(" ","-",$c->titulo).'">'.$c->titulo.' <small class="counter">('.$c->total_produtos.')</small></a>';
    }
    //----
?>

<!-- Top bar -->
<div class="topbar">
      <div class="container d-flex">

        <!-- service contact -->
        <nav class="nav d-none d-md-flex"> <!-- hidden on xs -->
          <a class="nav-link pl-0" href="javascript:void(0)"><i data-feather="phone"></i> (12) 3131-3131</a>
          <a class="nav-link" href="javascript:void(0)"><i data-feather="mail"></i> contato@chokoart.com.br</a>
        </nav>

        <!-- social media -->
        <nav class="nav">
          <a class="nav-link pr-2 pl-0" href="javascript:void(0)"><i data-feather="facebook"></i></a>
          <a class="nav-link px-2" href="javascript:void(0)"><i data-feather="instagram"></i></a>
        </nav>

        <!-- User dropdown -->
        <ul id="containerFrmLoginTopo" class="nav nav-lang ml-auto">
          <?php FrmLoginTopo::Get(); ?>
        </ul>
        <!-- /User dropdown -->

      </div><!-- /.container -->
    </div>
    <!-- /Top bar -->


    <!--Header -->
    <header>
      <div class="container">

        <!-- Sidebar toggler -->
        <a class="nav-link nav-icon ml-ni nav-toggler mr-3 d-flex d-lg-none" href="#" data-toggle="modal" data-target="#menuModal"><i data-feather="menu"></i></a>

        <!-- Logo -->
        <a class="nav-link nav-logo" href="./"><!--img src="/img/logo.svg" alt="Chokoart"--> <strong>Chokoart</strong></a>

        <!-- Main navigation -->
        <ul class="nav nav-main d-none d-lg-flex"> <!-- hidden on md -->
          <li class="nav-item dropdown dropdown-hover">
            <a class="nav-link dropdown-toggle forwardable" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Categorias <i data-feather="chevron-down"></i>
            </a>
            <div class="dropdown-menu">
              <?php
                //----| LISTA AS CATEGORIAS NA LATERAL |----
                echo $CATEGORIASMENU;
                //----
              ?>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="./materia-prima">Materia Prima</a></li>
          <li class="nav-item"><a class="nav-link" href="./manutenção">Manutenção</a></li>
          <li class="nav-item"><a class="nav-link" href="./contate-nos">Contato</a></li>
        </ul>
        <!-- /Main navigation -->

        <ul class="nav ml-auto ml-sm-3">
         

          <!-- Cart -->
          <li class="nav-item d-inline-flex ml-2 ml-lg-0 float-right">
            <a class="nav-link nav-icon mr-nis dropdown-toggle forwardable ml-2" href="./cart" role="button" aria-haspopup="true" aria-expanded="false">
              <i data-feather="shopping-cart"></i>
              <span id="badge-tot-cart-list1" class="badge badge-primary">0</span>
            </a>
            
          </li>
          <!-- /Cart -->

          <!-- Wish List -->
          <li class="nav-item d-inline-flex ml-2 ml-lg-0 float-right">
            <a class="nav-link nav-icon mr-nis forwardable ml-2" href="./account-whishlist" role="button" aria-haspopup="true" aria-expanded="false">
              <i data-feather="heart"></i>
              <span id="badge-tot-whish-list1" class="badge badge-primary">0</span>
            </a>
          </li>
          <!-- /Wish List -->
        </ul>

        <!-- Search form toggler -->
        <li class="nav-item d-block d-sm-none ml-2 ml-lg-0">
          <a class="nav-link nav-icon search-toggle" href="#"><i data-feather="search"></i></a>
        </li>

        <!-- Search form -->
        <form class="form-inline form-search ml-auto mr-0 mr-sm-1 d-none d-sm-flex" method="POST" action="./buscador">
          <div class="input-group input-group-search">
            <div class="input-group-prepend">
              <button class="btn btn-light d-flex d-sm-none search-toggle" type="button"><i data-feather="chevron-left"></i></button>
            </div>
            <input type="text" name="termo_buscado" id="termo_buscado" class="form-control border-0 bg-light input-search" placeholder="Encontre..." required>
            <div class="input-group-append">
              <button class="btn btn-light" type="submit"><i data-feather="search"></i></button>
            </div>
          </div>
        </form>
        <!-- /Search form -->

      </div><!-- /.container -->
    </header>
    <!-- /Header -->