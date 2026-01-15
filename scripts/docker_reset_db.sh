#!/bin/bash
# Réinitialise la base de données avec Docker
set -euo pipefail

APP_DIR=/var/www/html
DB_FILE="$APP_DIR/writable/db_sae.db"

echo "🗄️  Réinitialisation de la base de données (Docker)..."
echo ""

echo "🗑️  Suppression de la base de données existante..."
docker exec php bash -lc "rm -f '$DB_FILE'"

echo "📋 Exécution des migrations..."
docker exec php bash -lc "cd '$APP_DIR' && php spark migrate"

echo "🌱 Insertion des données de test (seeders)..."
docker exec php bash -lc "cd '$APP_DIR' && php spark db:seed MasterSeeder"

echo "🔐 Configuration des permissions..."
docker exec php bash -lc "chown www-data:www-data '$DB_FILE' && chmod 664 '$DB_FILE'"

echo ""
echo "✅ Base de données réinitialisée avec succès !"
