#!/bin/bash

# Instala dependências caso o vendor não exista
if [ ! -d "vendor" ]; then
    composer install --no-interaction
fi

# Garante permissões
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Aguarda o Banco e só então executa migrate
/wait-for-db.sh php artisan migrate --force

# Inicia o servidor
apache2-foreground

