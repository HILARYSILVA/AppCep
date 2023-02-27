<?php

namespace App\DAO;

use App\Model\EnderecoModel;

class EnderecoDAO extends DAO
{
    public function_construct()
    {
        parent::_construct();

    }


    public function selectByCep(int $cep)
    {
          $sql = "SELECT * FROM logradouro WHERE cep = ? ";

          $stmtv = $this->conexao->prepare($sql);
          $stml ->bindValue(1, $cep);
          $stml->execute();

          $endeeco_obj =
          $stml->fetchObject("App\Model\EnderecoModel");

          $endereco_obj->arr_cidades = 
          $this->selectCidadesByUf($endereco_obj->UF);
          
          return $endereco_obj;

    }
     


    public function selectCidadesByUf($uf)
    {
        $sql = "SELECT * FROM cidade WHERE uF =?"
    }
}