<?php

use APP\Controller\EnderecoController;

$url = parse_url($_SERVER['REQUEST_UR1'], PHP_URL_PATH);

switch ($url)
{
       case '/endereco/by-cep':
        EnderecoController::getLogradouroByCep();
        break;


        case '/endereco/by-bairro':
         EnderecoController::getLogradouroByBairroAndCidade();
        break;


         case '/cidade/by-uf':
         EnderecoController::getCidadesByUf();
        break;


        case '/endereco/by-cep':
        EnderecoController::getLogradouroByCep();
        break;


        case'/bairro/by-cidade':
        EnderecoController::getBairrosByidCidade();
        break;

        

        default:
           http_response_code(403);
        break;
}
