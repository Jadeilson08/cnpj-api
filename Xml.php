<?php
require_once 'Validate.php';

class Xml{

    public function createXML($cnpj)
    {
        $validate = new Validate();
        $cnpj = $this->acessCNPJ($cnpj);
        $cnpj = $this->generateXML($cnpj);
        return $cnpj;
    }
    /**
     * - Retornar em XML
     * - Campos necessários (apenas esses):
     *   Nome = fantasia
     *   Razão Social = nome
     *   Endereço = logradouro
     *   CEP = cep
     *   UF = uf
     *   Numero = numero
     *   Bairro = bairro
     *   Email = email
     *   Situação Cadastral = situacao 
     *   Data Situação = data_situacao
     *   Codigo CNAE = atividade_principal -> code
     *   Descrição CNAE (principal) = atividade_principal -> text 
     *   Cidade = municipio
     *   Telefone = telefone
     *   Data de Abertura da Empresa = abertura
     * 
     */
    public function generateXML($cnpj)
    {
        $xml = new DOMDocument( "1.0", "utf-8" );
        $empresa = $xml->createElement("empresa");
        $nome = $xml->createElement("nome", utf8_encode($cnpj->fantasia));
        $razao_social = $xml->createElement("razaoSocial", utf8_encode($cnpj->nome));
        $endereco = $xml->createElement("endereco", utf8_encode($cnpj->logradouro));
        $cep = $xml->createElement("cep", utf8_encode($cnpj->cep));
        $uf = $xml->createElement("uf", utf8_encode($cnpj->uf));
        $numero = $xml->createElement("numero", utf8_encode($cnpj->numero));
        $bairro = $xml->createElement("bairro", utf8_encode($cnpj->bairro));
        $email = $xml->createElement("email", utf8_encode($cnpj->email));
        $situacao = $xml->createElement("situacao", utf8_encode($cnpj->situacao));
        $data_situacao = $xml->createElement("dataSituacao", utf8_encode($cnpj->data_situacao));
        $codigo_cnae = '';
        $descrição_cnae = '';
        foreach($cnpj->atividade_principal as $atividade_principal){
            $codigo_cnae = $xml->createElement("codigoCNAE", utf8_encode($atividade_principal->code));
            $descricao_cnae = $xml->createElement("descricaoCNAE", utf8_encode($atividade_principal->text));
        }
        $municipio = $xml->createElement("municipio", utf8_encode($cnpj->municipio));
        $telefone = $xml->createElement("telefone", utf8_encode($cnpj->telefone));
        $data_abertura = $xml->createElement("dataAbertura", utf8_encode($cnpj->abertura));
        $empresa->appendChild($nome);
        $empresa->appendChild($razao_social);
        $empresa->appendChild($endereco);
        $empresa->appendChild($cep);
        $empresa->appendChild($uf);
        $empresa->appendChild($numero);
        $empresa->appendChild($bairro);
        $empresa->appendChild($email);
        $empresa->appendChild($situacao);
        $empresa->appendChild($data_situacao);
        $empresa->appendChild($codigo_cnae);
        $empresa->appendChild($descricao_cnae);
        $empresa->appendChild($municipio);
        $empresa->appendChild($telefone);
        $empresa->appendChild($data_abertura);
        $xml->appendChild($empresa);
        return $xml->saveXML();

    }

    public function acessCNPJ($cnpj)
    {
        $url = "https://www.receitaws.com.br/v1/cnpj/".$cnpj;
        $ci = curl_init($url);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        $cnpj = json_decode(curl_exec($ci));
        return $cnpj;
    }


}

