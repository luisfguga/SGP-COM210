<div class="footer">
      <div class="container">
        <div class="row  justify-content-center no-gutters">
          
          <div class="col-sm-12 col-md-3">
            <h6 class="bold">Serviços ao Cliente</h6>
            <div class="list-group list-group-flush list-group-no-border list-group-sm">
              <a href="javascript:void(0)" class="list-group-item list-group-item-action">Centro de Ajuda</a>
              <a href="javascript:void(0)" class="list-group-item list-group-item-action">Modalidades de Entrega</a>
              <a href="javascript:void(0)" class="list-group-item list-group-item-action">Formas de Pagamento</a>
              <a href="javascript:void(0)" class="list-group-item list-group-item-action">Devoluções</a>
            </div>
          </div>
          <div class="col-sm-12 col-md-3">
            <h6 class="bold">Chokoart</h6>
            <div class="list-group list-group-flush list-group-no-border list-group-sm">
              <a href="about.html" class="list-group-item list-group-item-action">Sobre</a>
              <a href="javascript:void(0)" class="list-group-item list-group-item-action">Política de Privacidade</a>
              <a href="faq.html" class="list-group-item list-group-item-action">FAQs</a>
            </div>
          </div>
          <div class="col-sm-12 col-md-3">
            <h6 class="bold">Em breve!</h6>
            <a href="javascript:void(0)" class="download-app">
              <div class="media">
                <img src="./img/app/google-play.svg" alt="Google Play Logo" height="30">
                <div class="media-body">
                  <small>Baixe no</small>
                  <h5>Google Play</h5>
                </div>
              </div>
            </a>
            <a href="javascript:void(0)" class="download-app">
              <div class="media">
                <img src="./img/app/apple.svg" alt="Apple Logo" height="30">
                <div class="media-body">
                  <small>Baixe na</small>
                  <h5>App Store</h5>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">Copyright © <?php echo date("Y"); ?> Chokoart - Todos direitos reservedos</div>

    <!--Menu Modal -->
    <div class="modal modal-left modal-menu" id="menuModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header shadow">
            <a class="h5 mb-0 d-flex align-items-center" href="./">
              <img src="./img/logo.svg" alt="Mimity" class="mr-3">
              <strong>CHOKOART</strong>
            </a>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body shadow">
            <ul class="menu" id="menu">
              <li class="nav-item"><a class="nav-link" href="./">Página Principal</a></li>
              <li>
                <a href="#" class="has-arrow">Categorias</a>
                <ul>
                  <?php
                    //----| LISTA AS CATEGORIAS NA LATERAL |----
                    echo $CATEGORIASMENU;
                    //----
                  ?>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="./materia-prima">Materia Prima</a></li>
              <li class="nav-item"><a class="nav-link" href="./manutenção">Manutenção</a></li>
              <li class="nav-item"><a class="nav-link" href="./contate-nos">Contato</a></li>
              
              

            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /Menu Modal -->
