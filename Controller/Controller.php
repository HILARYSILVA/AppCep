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

    protected static function getExceptionAsJSON(Exception $e)
    {
        $exception = [

            'message' => $e->getMessage(),
            'code' =>$e->getCode(),
            'file' =>$e->getFile(),
            'line' =>$e->getLine(),
            'traceAsString' => $e->getTraceAsString(),
            'previous' => $e->getPrevious()
        ];

        http_response_code(400);

        header("Acces-Contrtol-Allow-Origin: *");
        header("Content-type: application/json; charset=utf-8");
        header("Cache -Control: no cache, must-revalidate");
        header("Expires: Mon,26 Jul 1997 05:00:00 GMT");

        exit(json_encode($exception));

    }
    protected static function isGet()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "GET")
           throw new Exception( "O metodo de requisicao deve ser GET");

    }

    protected static function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "GET")
           throw new Exception( "O metodo de requisicao deve ser Post");

    }
    
}

