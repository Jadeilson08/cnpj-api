<?php
class Validate{
    #valida se há caracteres especiais
    public function validateCNPJ($cnpj)
    {
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        if(strlen($cnpj)!=14){
            return "CNPJ Inválido";
        }else{
            return (string) $cnpj;
        }
    }

    #Valida se foi realizado muitas requisições ou se a conexão está indisponível
    public function validateRequest($cnpj)
    {
        if($cnpj != null && $cnpj != 'null'){
            return true;
        }else{
            return false;
        }
    }
}