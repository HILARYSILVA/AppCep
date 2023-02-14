<?php

namespace App\Controller;

include 'Controller.php';

class EnderecoController extends Controller
{
    public static function teste()
    {
       // var_dump("Querid@s alun@s");
       //parent::getResponseAsJSON("Querid@os alun@os");

       $cidades = ['jau', 'bariri', 'Itapuí', 'DC'];

       parent::getResponseAsJSON($cidades);


    }
}
?>

