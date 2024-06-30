<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Ajrc\Helper\Login;
use Ajrc\Helper\Sessions;
use Ajrc\Model\Usuario;
use Ajrc\Model\Fornecedor;
use Ajrc\Model\Categoria;
use Ajrc\Model\Destaque;
use Ajrc\Model\Produto;


// Routes
//========================| LOGIN / LOGOUT |=========================================================
//FORMULÁRIO DE LOGIN
$app->get('/login', function (Request $request, Response $response, array $args) {
    
    //USUÁRIO JÁ LOGADO VAI DIRETO PARA O DASHBOARD OU ACCOUNT-PROFILE
    if(strlen( trim( json_encode( Sessions::getData() ) ) ) > 15){
        
        if(Sessions::isAdmin() || Sessions::isFuncionario()) //se admin ou funcionario, dashboard
        {
            return $response->withRedirect($this->router->pathFor('dashboard', [], []));
        }
        else //cliente é direcionado para a página HOME PAGE / PÁGINA PRINCIPAL
        {
            return $response->withRedirect($this->router->pathFor('account-profile', [], []));
        }
    
    }
    //----

    //DESTROI A SESSAO EXISTENTE FORÇANDO NOVO LOGIN
    Sessions::unregister( "USER_DATA_ID" );
    
    return $this->renderer->render($response, 'private/login/index.phtml', $args);

})->setName('login');

//RECEBE OS DADOS ENVIADOS DO FORMULÁRIO DE LOGIN DA ÁREA ADMINISTRATIVA
$app->post('/login', function (Request $request, Response $response, array $args) {
    
    if( Login::validar() ) {
        return $response->withRedirect($this->router->pathFor('dashboard', [], []));
    } else {
        return $response->withRedirect($this->router->pathFor('login', [], ['msg'=>base64_encode('Usuário Inexistente')]));
    }

});

//LOGOUT
$app->get('/logout', function (Request $request, Response $response, array $args) {

    //DESTROI A SESSÃO E REDIRECIONA PARA O FORMULÁRIO DE LOGIN
    Sessions::unregister( "USER_DATA_ID" );

    return $response->withRedirect($this->router->pathFor('login', [], []));

})->setName('logout');

//========================| FIM: LOGIN / LOGOUT |=========================================================


//========================| DASHBOARD |=========================================================
//DASHBOARD
$app->get('/dashboard', function (Request $request, Response $response, array $args) {

    //DIRECIONA USUÁRIO NÃO LOGADO AO FORM DE LOGIN
    if(!Sessions::Validator()) { return $response->withRedirect($this->router->pathFor('login', [], [])); }
    //----

    if( !in_array(base64_decode('admin') ,Sessions::Permissions()) ) {
        echo "O kra não poderá ver esta página";
    }
    
    return $this->renderer->render($response, 'private/dashboard/index.phtml', $args);

})->setName('dashboard');

//========================| FIM: DASHBOARD |=========================================================


//========================| USUÁRIO |=========================================================

$app->any('/usuarios[-{form}]', function (Request $request, Response $response, array $args) {

    //DIRECIONA USUÁRIO NÃO LOGADO AO FORM DE LOGIN
    if(!Sessions::Validator() || $validate==1) { return $response->withRedirect($this->router->pathFor('login', [], [])); }
    //----

    if($request->getMethod()=="POST") 
    {
        //RECEBE O DADOS ENVIADOS DOS FORMULÁRIO DE CADASTRO E ATUALIZAÇÃO
        if( array_key_exists("operacao",$_POST) ) { 
            
            switch($_POST["operacao"]) {
                case "insert": //ADMIN / FUNCIONÁRIO CADASTRANDO USUÁRIO
                    $args = Usuario::Insert();
                    break;
                case "update": //ADMIN / FUNCIONÁRIO EDITANDO USUÁRIO
                    $args = Usuario::Update();
                    break;
                case "public": //USUÁRIO NA ÁREA PÚBLICA EDITANDO SEU PERFIL
                    $args = Usuario::Update();
                    return $response->withRedirect($this->router->pathFor('account-profile', [], ["status"=>$args["status"]]));
                    break;
            }

        }
        
    }

    //RENDERIZA AS TELAS DE LISTAGEM, CADASTRO E ALTERAÇÃO
    return $this->renderer->render($response, 'private/usuarios/index.phtml', $args);

});

//========================| FIM : USUÁRIO |=========================================================


//========================| FORNECEDOR |=========================================================

$app->any('/fornecedores[-{form}]', function (Request $request, Response $response, array $args) {

    //DIRECIONA USUÁRIO NÃO LOGADO AO FORM DE LOGIN
    if(!Sessions::Validator()) { return $response->withRedirect($this->router->pathFor('login', [], [])); }
    //----

    if($request->getMethod()=="POST") 
    {
        //RECEBE O DADOS ENVIADOS DOS FORMULÁRIO DE CADASTRO E ATUALIZAÇÃO
        if( array_key_exists("operacao",$_POST) ) { 
            
            switch($_POST["operacao"]) {
                case "insert":
                    $args = Fornecedor::Insert();
                    break;
                case "update":
                    $args = Fornecedor::Update();
                    break;
            }

        }
        
    }

    //RENDERIZA AS TELAS DE LISTAGEM, CADASTRO E ALTERAÇÃO
    return $this->renderer->render($response, 'private/fornecedores/index.phtml', $args);

});

//========================| FIM : FORNECEDOR |=========================================================

//========================| CATEGORIA |=========================================================

$app->any('/categorias[-{form}]', function (Request $request, Response $response, array $args) {
    
    //DIRECIONA USUÁRIO NÃO LOGADO AO FORM DE LOGIN
    if(!Sessions::Validator()) { return $response->withRedirect($this->router->pathFor('login', [], [])); }
    //----

    if($request->getMethod()=="POST") 
    {
        //RECEBE O DADOS ENVIADOS DOS FORMULÁRIO DE CADASTRO E ATUALIZAÇÃO
        if( array_key_exists("operacao",$_POST) ) { 
            
            switch($_POST["operacao"]) {
                case "insert":
                    $args = Categoria::Insert();
                    break;
                case "update":
                    $args = Categoria::Update();
                    break;
            }

        }
        
    }

    //RENDERIZA AS TELAS DE LISTAGEM, CADASTRO E ALTERAÇÃO
    return $this->renderer->render($response, 'private/categorias/index.phtml', $args);

});

//========================| FIM : CATEGORIA |=========================================================

//========================| DESTAQUE PRINCIPAL |=========================================================

$app->any('/destaques[-{form}]', function (Request $request, Response $response, array $args) {

    //DIRECIONA USUÁRIO NÃO LOGADO AO FORM DE LOGIN
    if(!Sessions::Validator()) { return $response->withRedirect($this->router->pathFor('login', [], [])); }
    //----

    if($request->getMethod()=="POST") 
    {
        //RECEBE O DADOS ENVIADOS DOS FORMULÁRIO DE CADASTRO E ATUALIZAÇÃO
        if( array_key_exists("operacao",$_POST) ) { 
            
            switch($_POST["operacao"]) {
                case "insert":
                    $args = Destaque::Insert();
                    break;
                case "update":
                    $args = Destaque::Update();
                    break;
            }

        }
        
    }

    //RENDERIZA AS TELAS DE LISTAGEM, CADASTRO E ALTERAÇÃO
    return $this->renderer->render($response, 'private/destaques/index.phtml', $args);

});

//========================| FIM : DESTAQUE PRINCIPAL |=========================================================

//========================| PRODUTO |=========================================================

$app->any('/produtos[-{form}]', function (Request $request, Response $response, array $args) {

    //DIRECIONA USUÁRIO NÃO LOGADO AO FORM DE LOGIN
    if(!Sessions::Validator()) { return $response->withRedirect($this->router->pathFor('login', [], [])); }
    //----

    if($request->getMethod()=="POST") 
    {
        //RECEBE O DADOS ENVIADOS DOS FORMULÁRIO DE CADASTRO E ATUALIZAÇÃO
        if( array_key_exists("operacao",$_POST) ) { 
            
            switch($_POST["operacao"]) {
                case "insert":
                    $args = Produto::Insert();
                    break;
                case "update":
                    $args = Produto::Update();
                    break;
            }

        }
        
    }

    //RENDERIZA AS TELAS DE LISTAGEM, CADASTRO E ALTERAÇÃO
    return $this->renderer->render($response, 'private/produtos/index.phtml', $args);

});

//========================| FIM : PRODUTO |=========================================================
