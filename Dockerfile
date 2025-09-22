# Base: Ubuntu 24.04
FROM ubuntu:24.04

# Variáveis de ambiente
ARG WWWGROUP=1000
ARG WWWUSER=1000
ENV DEBIAN_FRONTEND=noninteractive
WORKDIR /var/www/html

# Instalar dependências básicas
RUN apt-get update && apt-get install -y \
    curl git unzip zip libicu-dev libonig-dev libxml2-dev libzip-dev \
    nodejs npm sudo gnupg2 ca-certificates lsb-release software-properties-common \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Adicionar PPA do PHP 8.2
RUN add-apt-repository ppa:ondrej/php -y \
    && apt-get update \
    && apt-get install -y \
       php8.2-cli php8.2-mbstring php8.2-intl php8.2-xml php8.2-curl php8.2-mysql php8.2-zip php8.2-mongodb \
       php8.2-bcmath php8.2-sockets php8.2-tokenizer \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Composer global
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar código do Laravel
COPY . /var/www/html

# Permissões de storage e cache
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache



# Expor porta que o artisan serve vai usar
EXPOSE 8000

# Comando padrão: rodar Laravel via artisan serve
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
