<?php

namespace App\Controller;

use Exception ;


abstract class Controller
{
    protected static function getResponseAsJSON($data)
    {
        header("Acces-Contrtol-Allow-Origin: *");
        header("Content-type: application/json; charset=utf-8");
        header("Cache -Control: no cache, must-revalidate");
        header("Expires: Mon,26 Jul 1997 05:00:00 GMT");

        exit(json_encode($data));
    }
    
}

