#!/bin/bash
# Script de démarrage avec Docker

echo "🚀 Démarrage de PommeHub avec Docker..."
echo ""

cd "$(dirname "$0")/.."

echo "📦 Lancement des conteneurs..."
docker-compose up --detach

if [ $? -eq 0 ]; then
    echo ""
    echo "✅ Application démarrée avec succès !"
    echo ""
    echo "🌐 Accédez au site : http://localhost:8080"
    echo ""
else
    echo ""
    echo "❌ Erreur lors du démarrage. Vérifiez que Docker est bien installé et lancé."
fi
