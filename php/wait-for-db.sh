#!/bin/bash

# Espera o MySQL responder antes de rodar migrate
echo "⏳ Aguardando MySQL iniciar..."

until php -r "try { new PDO('mysql:host=db;dbname=${DB_DATABASE}', '${DB_USERNAME}', '${DB_PASSWORD}'); } catch (Exception \$e) { exit(1); }"; do
    sleep 2
done

echo "✅ MySQL disponível!"

exec "$@"
