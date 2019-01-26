# Backend - Autoescola

Api do projeto autoescola criado em [Laravel 5.7](https://laravel.com/). Desenvolvido por Fabricainfo.

## Pré requisitos:

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension
- Docker >= 18.06.1-ce

## Navegadores
* Chrome, Firefox, Safari, Edge, IE11+

## Instalação

Para instalar a Api do projeto autoescola basta seguir os passos abaixo:

```
# clone o repositorio
$ git clone <link> backend-autoescola

# Entre no repositório criado e crie o docker-compose.yml. Já existe um modelo (docker-compose.default.yml):
$ cd front-autoescola
$ sudo cp docker-compose.default.yml docker-compose.yml

# Crie o container da Api e instale as dependencias.
$ sudo docker-compose up -d
$ sudo docker-compose exec autoescola-backend composer install
$ sudo docker-compose exec autoescola-backend chmod 777 -R vendor

# Execute o comando abaixo para configurar a Api.
$ sudo docker-compose exec autoescola-backend php artisan sistema 

# Após a configuração basta rodar a Api.
$ http://localhost:8000
```
