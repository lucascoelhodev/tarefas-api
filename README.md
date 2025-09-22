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
   | Variável            | Descrição                 | Exemplo       |
    | ------------------- | ------------------------- | ------------- |
    | `APP_NAME`          | Nome da aplicação         | `Tarefas API` |
    | `APP_ENV`           | Ambiente da aplicação     | `local`       |
    | `APP_DEBUG`         | Ativar debug              | `true`        |
    | `DB_CONNECTION`     | Tipo de banco             | `mysql`       |
    | `DB_HOST`           | Host do banco no Docker   | `mysql`       |
    | `DB_PORT`           | Porta do banco            | `3306`        |
    | `DB_DATABASE`       | Nome do banco             | `laravel`     |
    | `DB_USERNAME`       | Usuário do banco          | `root`        |
    | `DB_PASSWORD`       | Senha do banco            | `secret`      |
    | `MONGO_DB_HOST`     | Host do MongoDB no Docker | `mongo`       |
    | `MONGO_DB_PORT`     | Porta do MongoDB          | `27017`       |
    | `MONGO_DB_DATABASE` | Nome do banco Mongo       | `laravel`     |
    | `MONGO_DB_USERNAME` | Usuário Mongo             | `root`        |
    | `MONGO_DB_PASSWORD` | Senha Mongo               | `secret`      |
   ⚠️ Não altere APP_KEY. Ela será gerada automaticamente no próximo passo.

3. Suba os containers Docker:
```
docker-compose up -d
```   
4. Acesse o container:
    ```
    docker exec -it laravel_app bash
    ```
5. Instale as dependências:
    ```
    composer install
    ```
5. Instale a APP_KEY:
   ```
   php artisan key:generate
   ```
6. Rode as migrations:
   ```
   php artisan migrate
   ```
### Testando a aplicação
Execute dentro do container da aplicação:
    ```
    php artisan test
    ``

7. Acesse a documentação no seguinte link: http://localhost:8080/api/documentation#/Tasks para testar os endpoints.
