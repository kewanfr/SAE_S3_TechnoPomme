#!/bin/bash
# Réinitialise la base de données avec Podman
set -euo pipefail

APP_DIR=/var/www/html
DB_FILE="$APP_DIR/writable/db_sae.db"

echo "🗄️  Réinitialisation de la base de données (Podman)..."
echo ""

echo "🗑️  Suppression de la base de données existante..."
podman exec php bash -lc "rm -f '$DB_FILE'"

echo "📋 Exécution des migrations..."
podman exec php bash -lc "cd '$APP_DIR' && php spark migrate"

echo "🌱 Insertion des données de test (seeders)..."
podman exec php bash -lc "cd '$APP_DIR' && php spark db:seed MasterSeeder"

echo "🔐 Configuration des permissions..."
podman exec php bash -lc "chown www-data:www-data '$DB_FILE' && chmod 664 '$DB_FILE'"

echo ""
echo "✅ Base de données réinitialisée avec succès !"
