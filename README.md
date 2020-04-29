# API-CNPJ

Esta API, por meio do CNPJ, se conecta a [ReceitaWS](https://www.receitaws.com.br/api) e retorna, em formato JSON, os dados da empresa.

### Instalação
1. Servidor Apache com `LoadModule rewrite_module modules/mod_rewrite.so` habilitado e insira `AccessFileName .htaccess`
2. Faça o clone desse projeto dentro do servidor Apache
3. Inicie a aplicação

### Teste
  
1. Abra o Postman ou o navegador
2. Acesse `http://localhost:80/api/cnpj/04391715000173`
3. `Output`
![image](https://user-images.githubusercontent.com/49295476/80495702-452c6c80-8936-11ea-9240-c9c508a1b285.png)

### Observações

1. A API foi feita em PHP 7
2. Essa API só aceita requisições **GET**
3. `04391715000173` é um CNPJ, portanto pode ser alterado
4. Caso ocorra algum erro será informado