<?php

namespace App\Model;

use App\DAO\EnderecoDAO;

class CidadeModel extends Model
{
    public $id_cidade, $descricao, $uf, $codigo_ibge, $ddd;

    public function getCidadesByUf($uf)
    {
        $dao = new EnderecoDAO();
       
        $this->rows = $dao->selectCidadesByUf($uf);
    }

    public static function getCidadesByUf(): void 
    {

    }

    public static function getBairrosByidCidade (): void
    {

    }
    
}