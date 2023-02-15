FROM php:8.1.1-fpm

# Arguments
ARG user=nathan
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    vim nano\
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Instalar o Node.js e o NPM
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs

# Giving permitions to docker-php-entrypoin
RUN chmod 755 /usr/local/bin/docker-php-entrypoint

# Set working directory
WORKDIR /var/www

USER $user

# Rewrite a docker-php-entrypoint
COPY build/entrypoint.sh /usr/local/bin/docker-php-entrypoint

# Instalar as dependências do NPM
RUN npm install