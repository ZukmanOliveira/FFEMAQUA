### README
## Sobre
<p>FEMAQUA (Ferramentas Maravilhosas Que Adoro). Se trata de uma  aplicação é um simples repositório para gerenciar ferramentas com seus respectivos nomes, links, descrições e tags.</p>



## Pre-requisitos
- [Git](https://www.digitalocean.com/community/tutorials/how-to-install-git-on-ubuntu-20-04-pt) [>=2.37.2]
- [PHP](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-20-04-pt) [>=8.0.22]
- [Composer](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04-pt) [>=2.3.5]
- [Mysql](https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-20-04-pt) [>=8.0.30]
- Laravel [9.0]

## Instalação e Configuração 
- Clone o repositório usando o git em sua maquina

- Crie uma base de dados com o nome de sua preferência

- Configure o seu arquivo .env e sete os valores para conexão com banco de dados
```bash
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=root
DB_PASSWORD=

```
- Após configurar os valores para conexão com banco de dados, execute os comandos no terminal.

```bash
$ php artisan migrate

$ php artisan db:seed
```

```bash

#Execute o comado abaixo para startar o server na porta 3000

$ php artisan serve --port=3000

```
## Testando api
Acesse o link http://localhost:3000/api/documentation para consultar as rotas disponíveis. Você pode consumir-las aparti da publicação ou se preferir usar uma ferramenta sua preferência.
## Features
- [x] Criação de ferramentas
- [x] Consultar ferramentas
- [x] Filtragem de ferramenta
- [x] Exclusão de ferramentas
