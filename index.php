<?php
    header('Content-type: application/json;  charset=utf-8');
    $path = explode('/', $_GET['url']);
    $cnpj = validateCNPJ($path[1]);
        if($_SERVER['REQUEST_METHOD'] === 'GET'){            
            $cnpj = generateJSON($cnpj);
            echo validateRequest($cnpj);
        }else{
            echo "Requisição POST é inválida";    
        }
    
    #valida se há caracteres especiais
    function validateCNPJ($cnpj)
    {
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        if(strlen($cnpj)!=14){
            echo "CNPJ Inválido";
            exit;
        }else{
            return (string) $cnpj;
        }
    }

    #Acessar o site www.receitaws.com.br e cria o JSON
    function generateJSON($cnpj)
    {
        $url = "https://www.receitaws.com.br/v1/cnpj/".$cnpj;
        $ci = curl_init($url);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        $cnpj = json_decode(curl_exec($ci));
        $cnpj = json_encode($cnpj);
        return $cnpj;
    }

    #Valida se foi realizado muitas requisições ou se a conexão está indisponível
    function validateRequest($cnpj)
    {
        if($cnpj != null && $cnpj != 'null'){
            return $cnpj;
        }else{
            return "Muitas requisições";
        }
    }
