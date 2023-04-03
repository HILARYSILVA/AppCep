<?php

use APP\Controller\EnderecoController;

$url = parse_url($_SERVER['REQUEST_UR1'], PHP_URL_PATH);

switch ($url)
{  
      //http://localhost:8000/endereco/by-cep?cep=17210580
       case '/endereco/by-cep':
        EnderecoController::getLogradouroByCep();
        break;


        //http://localhost:8000/cep/by-logradouro/by-bairro?id_cidade=4874&bairro=Jardim América
        case '/endereco/by-bairro':
         EnderecoController::getLogradouroByBairroAndCidade();
        break;

         //http://localhost:8000/cidade/by-uf?uf=SP
         case '/cidade/by-uf':
         EnderecoController::getCidadesByUf();
        break;

          //http://localhost:8000/cep/by-logradouro?logradouro=Rua Raphael de Almeida Leite  
        case '/endereco/by-cep':
        EnderecoController::getLogradouroByCep();
        break;

          //http://localhost:8000/bairro/by-cidade?id=4874
        case'/bairro/by-cidade':
        EnderecoController::getBairrosByidCidade();
        break;

        

        default:
           http_response_code(403);
        break;
}
