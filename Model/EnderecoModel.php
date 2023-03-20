<?php

namespace App\Model;

use App\DAO\EnderecoDAO; 
use FFI\Exception;


class EnderecoModel extends Model
{
    public $id_logradouro, $tipo, $descricao, $id_cidade,
           $uf, $complemento, $descricao_sem_numero,
           $descricao_cidade, $codigo_cidade_ibge, $descricao_bairro;

    public $arr_cidade;





    public function getLogradouroByCep(int $cep)
    {
        try
        {
            $dao = new EnderecoDAO ();

            return $dao->selectByCep($cep);

        }catch(Exception  $e) {

            throw $e;
    }
}

    public function getCepLogradouro($logradouro)
    {
        try
        {
            $dao = new EnderecoDAO();

            return $dao->selectCepByLogradouro($logradouro);

        }catch(Exception $e) {
            echo $e-> getMessage();
        }
    }

    
    
}