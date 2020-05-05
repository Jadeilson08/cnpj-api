<?php
require_once 'Json.php';
    header('Content-type: application/json;  charset=utf-8');
    #path = /cnpj/json/numero_cnpj ou /cnpj/xml/numero_cnpj
    $path = explode('/', $_GET['url']);
    if(strtolower($path[1]) == 'json'){
        $json = new Json();
        echo $json->createJson($path[2]);
    }
    