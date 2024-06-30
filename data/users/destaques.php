<?php 

require '../../../vendor/autoload.php';

session_start();

use Ajrc\Helper\Sessions;
use Ajrc\Model\Destaque;

//DIRECIONA USUÁRIO NÃO LOGADO AO FORM DE LOGIN
if( ( strlen( trim( json_encode( Sessions::getData() ) ) ) < 15 ) && 
    ( !in_array(base64_decode('admin'),Sessions::Permissions()) || !in_array(base64_decode('funcionario'),Sessions::Permissions())  )) 
{
    header("location:../.././login");
}

header('Content-Type: application/json;charset=utf-8');

?>
{ 
    "data": 
        [ 
            <?php Destaque::ListAllAdmins(); ?>    
        ]
}
