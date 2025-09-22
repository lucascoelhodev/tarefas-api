# API de Tarefas - RESTFUL API

Este projeto é uma API RESTFUL que faz a gestão de tarefas e seus status.


## Como rodar o projeto localmente com Docker/Sail

### Requisitos
- Docker e Docker Compose instalados ([instruções](https://docs.docker.com/get-docker/))

### Passo a passo

1. Clone o repositório:
   ```bash
   git clone https://github.com/lucascoelhodev/tarefas-api.git
   cd catalogo-de-filmes
   ```
2. Copie o arquivo de ambiente e configure as variáveis:
   ```bash
   cp .env.example .env
   ```
Edite o .env para configurar:

APP_KEY: será gerada no próximo passo

DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD de acordo com o container
3. Rode o composer install:
```
composer install
```
    
4. Suba os containers via Sail:
    ```
    ./vendor/bin/sail up -d
    ```
5. Instale a APP_KEY:
   ```
   ./vendor/bin/sail php artisan key:generate
   ```
6. Rode as migrations:
   ```
   ./vendor/bin/sail php artisan migrate
   ```
### Testando a aplicação
Execute dentro do container da aplicação:
    ```
    ./vendor/bin/sail php artisan test
    ``

7. Acesse a documentação no seguinte link: http://localhost:8080/api/documentation#/Tasks para testar os endpoints.
