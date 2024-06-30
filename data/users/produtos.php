<?php 

require '../../../vendor/autoload.php';

session_start();

use Ajrc\Helper\Sessions;
use Ajrc\Model\Produto;

//DIRECIONA USUÁRIO NÃO LOGADO AO FORM DE LOGIN
if( ( strlen( trim( json_encode( Sessions::getData() ) ) ) < 15 ) && 
    ( @!in_array(base64_decode('admin'),Sessions::Permissions()) || @!in_array(base64_decode('funcionario'),Sessions::Permissions())  )) 
{
    header("location:../.././login");
}

header('Content-Type: application/json;charset=utf-8');

?>
{ 
    "data": 
        [ 
            <?php Produto::ListAllAdmins("id, categoria, titulo, qtde_atual, qtde_ideal, situacao, lucro, custo_estoque, lucro_estoque, status"); ?>    
        ]
}
