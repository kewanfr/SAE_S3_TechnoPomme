#!/bin/bash
# Script d'arrêt avec Docker

echo "🛑 Arrêt de PommeHub avec Docker..."
echo ""

cd "$(dirname "$0")/.."

docker-compose down

if [ $? -eq 0 ]; then
    echo ""
    echo "✅ Application arrêtée avec succès !"
else
    echo ""
    echo "❌ Erreur lors de l'arrêt."
fi
