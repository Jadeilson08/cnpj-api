# API-CNPJ

Esta API, por meio do CNPJ, se conecta a [ReceitaWS](https://www.receitaws.com.br/api) e retorna, em formato JSON, os dados da empresa.

### Servidor local
1. Servidor Apache com `LoadModule rewrite_module modules/mod_rewrite.so` habilitado e insira `AccessFileName .htaccess`
2. Faça o clone desse projeto dentro do servidor Apache
3. Inicie a aplicação

### Acesso remoto
  
1. Abra o Postman ou o navegador
2. Acesse `https://apicnpj.000webhostapp.com/cnpj/<CNPJ>`, `<CNPJ>` deve ser passado sem a máscara dos números 
3. `Output`
![image](https://user-images.githubusercontent.com/49295476/80495702-452c6c80-8936-11ea-9240-c9c508a1b285.png)

### Parâmetros

Existem apenas dois parâmentros de acesso:
URL de acesso
> `https://apicnpj.000webhostapp.com/cnpj/<CNPJ>`
1. `/cnpj` - tipo de documento para identificar
2. `/<CNPJ>` - o número do CNPJ.

### Observações

1. A API foi feita em PHP 7
2. Essa API só aceita requisições **GET**
3. Faz o uso da biblioteca `libcurl`
4. O PHP implementa a extensão `JSON` 
3. `<CNPJ>` é um CNPJ, portanto pode ser alterado
4. Caso ocorra algum erro será informado
5. Por enquanto tem apenas `/cnpj` como identificador. Futuramente haverá outros documentos.
