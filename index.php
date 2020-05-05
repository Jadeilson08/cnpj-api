<?php
require_once 'Json.php';
require_once 'Xml.php';
    $path = explode('/', $_GET['url']);
    $validate = new Validate();
    
    if($_SERVER['REQUEST_METHOD'] === 'GET' && $validate->validateCNPJ($path[2]) != false){
        #path = /cnpj/json/numero_cnpj ou /cnpj/xml/numero_cnpj
        
        if(strtolower($path[1]) == 'json'){
            header('Content-type: application/json;  charset=utf-8');
            $json = new Json();
            echo $json->createJson($path[2]);
        }else{
            header( "content-type: application/xml;  charset=utf-8" );
            $xml = new Xml();
            $xml = $xml->createXML($path[2]);
            echo $xml;            
        }
    }else{
        echo "Requisição inválida";  
    }
    