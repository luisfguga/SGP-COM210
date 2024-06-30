<nav class="navbar navbar-static-top header-navbar">
    <div class="header-navbar-mobile">
        <div class="header-navbar-mobile__menu">
        <button class="btn" type="button"><i class="fa fa-bars"></i></button>
        </div>
        <div class="header-navbar-mobile__title"><span>Dashboard</span></div>
        <div class="header-navbar-mobile__settings dropdown">
        <a class="btn dropdown-toggle" href="./logout" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-power-off"></i>
        </a>
        </div>
    </div>
    <div class="navbar-header"><a class="navbar-brand" href="./login">
        <div class="logo text-nowrap">
            <div class="logo__img"><i class="fa fa-chevron-right"></i></div>
            <span class="logo__text">
            <?php
                $foto_usuario = null;
                $pasta_imagens = "img/usuarios/";
                foreach (glob($pasta_imagens . Ajrc\Helper\Sessions::UserID() . "_1.*") as $foto) {
                    echo "<img src='".$foto."' class='rounded-circle' style='max-height:30px'>";
                }
            ?>
            </span>
        </div></a></div>
    <div class="topnavbar">
        <ul class="nav navbar-nav navbar-left">
        pode vir mais coisa aqui
        </ul>
        <ul class="userbar nav navbar-nav">
        <li class="dropdown">
            <a class="userbar__settings dropdown-toggle" href="./logout" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-power-off"></i>
            </a>
        </li>
        </ul>
    </div>
</nav>