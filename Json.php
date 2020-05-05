<?php
require_once 'Validate.php';

class Json{

    public function createJson($cnpj)
    {
        $validate = new Validate();
        $cnpj = $this->generateJSON($cnpj);
        return $cnpj;
    }

    #Acessar o site www.receitaws.com.br e cria o JSON
    private function generateJSON($cnpj)
    {
        $url = "https://www.receitaws.com.br/v1/cnpj/".$cnpj;
        $ci = curl_init($url);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        $cnpj = json_decode(curl_exec($ci));
        $cnpj = json_encode($cnpj);
        $validate = new Validate();
        if(!$validate->validateRequest($cnpj)){
            return "Muitas requisições";
        }
        return $cnpj;
    }

}