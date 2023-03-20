<?php

namespace App\DAO;

use App\Model\EnderecoModel;

class EnderecoDAO extends DAO
{
    public function __construct()
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
     


    public function selectCidadesByUf(int $uf)
    {
        $sql = "SELECT * FROM cidade WHERE uf =? ORDER BY descricao";

        $stmt = $this->conexao->prepare($sql);
        $stmt-> binValue(1, $uf);
        $stmt->execute()

     return $stmt->fetchAll(DAO::FETCH_CLASS);
        
    }
    public  function SelectLogradouroByBairroAndCidade(
        string  $bairro, int $id_cidade)
        {
            $sql = "SELECT * FROM logradouro
            WHERE descricao_bairro = ? AND id_cidade= ? ";
            
            
            $stmt = $this->conexao->prepare($sql);
            $stmt->binValue(1, $bairro);
            $stmt->binValue(2, $id_cidade);
            $stmt->execute();

            return $stmt->fetchAll(DAO::FETCH_CLASS);

        }
        public  function selectCidadesByUf($uf)
        {
            $sql = "SELECT * FROM cidade WHERE uf = ?
            ORDER BY descricao";

              $stmt = $this->conexao->prepare($sql);
            $stmt->binValue(1, $uf);
            $stmt->execute();

            
            return $stmt->fetchAll(DAO::FETCH_CLASS);
        }
        public function selectBairroByIdCidade(int $id_cidade)
        {

            $sql = "SELECT descricao_bairro
                    FROM logradouro
                    WHERE id_cidade = ?
                    GROUP BY descricao_bairro ";

            $stmt = $this->conexao->prepare($sql);
            $stmt->binValue(1, $id_cidade);
            $stmt->execute();

            
            return $stmt->fetchAll(DAO::FETCH_CLASS);

        }
        public function selectCepByLogradouro($lofradouro)
        {

            $sql = "SELECT * FROM logradouro
            WHERE descricao_sem_numero LIKE :q ";

            $stmt = $this->conexao->prepare($sql);
            $stmt->execute([':q' => "%" . $logradouro . "%"]);

            return $stmt->fetchAll(DAO::FETCH_CLASS);

        }
    } 
