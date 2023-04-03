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

    protected static function setResponseAsJSON($data, $_request_status = true)
    {
        $response = array('respopnse_data' => $data,
        'response_sucessful' => $_request_status);
        
        header("Acces-Contrtol-Allow-Origin: *");
        header("Content-type: application/json; charset=utf-8");
        header("Cache -Control: no-cache, must-revalidate");
        header("Expires: Mon,26 Jul 1997 05:00:00 GMT");
        header("Programa: public");

        exit(json_encode($response));
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
    
    protected static function getInFromUrl($var_get, $var_neme = null) : int
    {
        self::isGet();

        if(!empty($var_get))
                return (int) $var_get;
        else
            throw new Exception("variavel $var_neme não identificado.");
    }

    protected static function getStringFromUrl($var_get, $var_neme = null) : string
    {
        self::isGet();

        if(!empty($var_get))
                return (string) $var_get;
        else
            throw new Exception("variavel $var_neme não identificado.");
    }
}
