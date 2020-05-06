# API-CNPJ

Esta API, por meio do CNPJ, se conecta a [ReceitaWS](https://www.receitaws.com.br/api) e retorna, em formato JSON ou XML, os dados da empresa.

### Servidor local

1. Servidor Apache com `LoadModule rewrite_module modules/mod_rewrite.so` habilitado e insira `AccessFileName .htaccess`
2. Faça o clone desse projeto dentro do servidor Apache
3. Inicie a aplicação

### Acesso remoto

1. Abra o Postman ou o navegador
2. Acesse `http://api-cnpj.epizy.com/cnpj/<XML ou JSON>/<CNPJ>`, `<XML ou JSON>` é o tipo de retorno, `<CNPJ>` deve ser passado sem a máscara dos números 
3. Retorno em formato `Json`:
![image](https://user-images.githubusercontent.com/49295476/80495702-452c6c80-8936-11ea-9240-c9c508a1b285.png)
4. Retorno em formato `XML`:
![image](https://user-images.githubusercontent.com/49295476/81225560-6ab11a00-8fb7-11ea-83ec-531ff87aa328.png)

### Parâmetros

Existem apenas três parâmentros de acesso:
URL de acesso
> `http://api-cnpj.epizy.com/cnpj/<XML ou JSON>/<CNPJ>`
1. `/cnpj` - tipo de documento para identificar
2. `/<XML ou JSON>` - tipo de retorno, escolha `XML` para retornar em formato XML ou escolha `JSON` para retornar em formato Json
3. `/<CNPJ>` - o número do CNPJ.

### Observações

1. A API foi feita em PHP 7
2. Essa API só aceita requisições **GET**
3. Faz o uso da biblioteca `libcurl`
4. O PHP implementa a extensão `JSON` 
5. Para retornar o formato `XML` é implementado a Classe `DOMDocument`
6. `<CNPJ>` é um CNPJ, portanto pode ser alterado
7. Caso ocorra algum erro será informado
8. Por enquanto tem apenas `/cnpj` como identificador. Futuramente haverá outros documentos.
