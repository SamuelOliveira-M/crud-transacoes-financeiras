
# Introdução ao Projeto: SEMG.Edu

*Introdução ao Projeto:
  * O projeto envolve o desenvolvimento de uma aplicação que realizar as operações CRUD, no qual será possível realizar: criar, ler, modificar e deletar trasanções finaceiras. 

## 🛠️ Tecnologias utilizadas

Mencione as ferramentas que você usou para criar seu projeto

* TypeScript
* Express
* Postgress
* Prisma

## 📋 Pré-requisitos

Certifique-se de que você possui as seguintes ferramentas instaladas em sua máquina:

* Git - Para clonar o repositório.
* Node.js e npm - Necessário para rodar o Angular no frontend.
* PHP e Composer - Necessário para rodar o Laravel no backend.
* MySQL - Para configurar o banco de dados do projeto.

## 🛠️ Configuração e Inicialização do Projeto CRUD-TRANSACOES-FINANCEIRAS

### Clonar o Repositório
1. Abra o terminal e navegue até a pasta onde deseja clonar o projeto.
2. Execute o seguinte comando para clonar o repositório:
   ``` git clone https://github.com/SamuelOliveira-M/crud-transacoes-financeiras.git ```
3. Após clonar o repositório, entre na pasta do projeto:
   ``` cd crud-transacoes-financeiras ```

### Criar Banco de dados  
4. Acesse o MySQL via terminal e execute o comando: 
  ``` mysql -u root -p ```
5. Execute o Script SQL
   * Uma vez conectado ao MySQL, execute o script localizado no arquivo data-base.sql da seguinte maneira:
   * ``` SOURCE /caminho/para/seu/arquivo/data-base.sql; ```
   * OBS: Coloque o caminho completo do script !
    
6. Saída Esperada
   * Se o script for executado com sucesso, você verá mensagens confirmando a criação do banco de dados e das tabelas.

### Configuração do Backend (Laravel)

7. Navegue para a pasta backend do projeto:
``` cd backend ```
8. Instale as dependências do Laravel usando o Composer:
   ``` composer install ```
9. Crie uma cópia do arquivo de ambiente .env.example para .env, que armazenará as configurações específicas do projeto:
   ``` cp .env.example .env ```
10. Abra o arquivo .env em um editor de texto e atualize as informações de banco de dados com as credenciais configuradas anteriormente:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

```
11. Gere uma chave de aplicação para o Laravel:
 ``` php artisan key:generate ```
12. Execute as migrações para criar as tabelas no banco de dados MySQL:
  ``` php artisan migrate ```
13. Inicie o servidor do Laravel para disponibilizar a API do backend:
  ``` php artisan serve ```

  * O backend estará disponível em http://127.0.0.1:8000.

### Configuração do Frontend (Angular)
14. Abra um novo terminal e, na pasta raiz do projeto (crud-transacoes-financeiras), navegue até a pasta do frontend:
  ``` cd frontend ```
15. Instale as dependências do Angular:
  ``` npm install ```
16. Inicie o servidor de desenvolvimento do Angular:
  ``` ng serve ```
  * O frontend estará disponível em http://localhost:4200.








   
