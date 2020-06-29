API para prover os dados do registroCOVID

## Tecnologias
### Ambiente
- Docker
### API
- REST
- PHP 7.4 (FPM)
- Laravel 7

# Servidor de desenvolvimento 🚀🚀

Clonando o projeto

```
git clone https://github.com/EscolaDeSaudePublica/registrocovid-api.git
```


Entrar o diretório

```
cd registrocovid-api
```

Em seguida executar o comando

```
docker-compose up
```

Ao executar o comando acima, será criado 3 containers
- registrocovid-api_php-fpm_1
- registrocovid-api_db_1
- registrocovid-api_webserver_1

Acessar o container 'registrocovid-api_php-fpm_1'
```
docker exec -it registrocovid-api_php-fpm_1 bash
```

Dentro do container acessar o diretório o /application
```
cd /application
```

Instalar dependência do Laravel
```
composer install
```

Configurar os parametros no arquivo .env (banco, token) https://laravel.com/docs/7.x#configuration

```
cp .env.example .env
```

Gerar Application Key
```
php artisan key:generate
```

Será necessário da permissão para as views acessar os storage
```
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache`
```



