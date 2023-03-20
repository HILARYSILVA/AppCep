<?php

namespace App\Controller;

use App\Model\{EnderecoModel, CidadeModel};
use Exception;

include 'Controller.php';

class EnderecoController extends Controller
{
    public static function GetCepByLogradouro(): void 
    {

    }
    public static function GetLogradouroByBairroAndCidade(): void
    {

    }
    public static function getCidadesByUf(): void 
    {

    }
     public static function getLogradouroByCep(): void
    {

    }
    public static function getBairrosByidCidade (): void
    {

    }
   /* public static function teste()
    {
       // var_dump("Querid@s alun@s");
       //parent::getResponseAsJSON("Querid@os alun@os");

       $cidades = ['jau', 'bariri', 'Itapuí', 'DC'];

       parent::getResponseAsJSON($cidades);


    }*/
    public static function GetCepByLogradouro() : void
    {
        try
        {
             $logradouro = $_GET['logradouro'];

             $model = new EnderecoModel();
             $model->GetCepByLogradouro($logradouro);

             parent ::getResponseAsJSON($model->rows);
        
            }catch (Exception $e) {

                parent::getExceptionAsJSON($e)
            }
    }
    public static function GetLogradouroByBairroAndCidade() : void
    {
        try
        {
            $bairro = 
            parent :: getStringFromUrl(
                isset($_GET['bairro']) ? $_GET['bairro'] : null,
                'bairro');

            $id_cidade = parent::getInFromUrl(
                isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null,
                'cep');  

            $model = new EnderecoModel();

            $model->GetLogradouroByBairroAndCidade($bairro, $id_cidade);

            parent::getResponseAsJSON($model->rows);
            
        }catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getLogradouroByCep() : void
    {
        try
        {
            $cep = 
            parent :: getInFromUrl(
                isset($_GET['cep']) ? $_GET['cep'] : null);  

            $model = new EnderecoModel();

            parent::getResponseAsJSON($model->getLogradouroByCep($cep));
            
        }catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }
    public static function getBairrosByidCidade() : void
    {
        try
        {

            $id_cidade = parent::getInFromUrl(
                isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null);  

            $model = new EnderecoModel();

            $model->getBairrosByidCidade( $id_cidade);

            parent::getResponseAsJSON($model->rows);
            
        }catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getCidadesByUf() : void
    {
        try
        {
            $uf = $_GET['uf'];

            $model = new EnderecoModel();
            $model->getCidadesByUf($uf);

            parent::getResponseAsJSON($model->rows);
            
        }catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }
}

?>

