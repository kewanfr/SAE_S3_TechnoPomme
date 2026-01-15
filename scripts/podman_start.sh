#!/bin/bash
# Script de démarrage avec Podman

echo "🚀 Démarrage de PommeHub avec Podman..."
echo ""

cd "$(dirname "$0")/.."

echo "🔑 Connexion à Docker Hub..."
podman login docker.io

echo ""
echo "📦 Lancement des conteneurs..."

# Essai avec podman-compose (Linux personnel)
if command -v podman-compose &> /dev/null; then
    podman-compose up --detach
# Sinon essai avec podman compose (PC IUT)
elif podman compose version &> /dev/null; then
    podman compose up --detach
else
    echo "❌ Erreur : ni 'podman-compose' ni 'podman compose' n'est disponible."
    echo "   Installez podman-compose : pip install podman-compose"
    exit 1
fi

if [ $? -eq 0 ]; then
    echo ""
    echo "✅ Application démarrée avec succès !"
    echo ""
    echo "🌐 Accédez au site : http://localhost:8080"
    echo ""
else
    echo ""
    echo "❌ Erreur lors du démarrage."
fi
