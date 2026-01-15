#!/bin/bash
# Script d'arrêt avec Podman

echo "🛑 Arrêt de PommeHub avec Podman..."
echo ""

cd "$(dirname "$0")/.."

# Essai avec podman-compose (Linux personnel)
if command -v podman-compose &> /dev/null; then
    podman-compose down
# Sinon essai avec podman compose (PC IUT)
elif podman compose version &> /dev/null; then
    podman compose down
else
    echo "❌ Erreur : ni 'podman-compose' ni 'podman compose' n'est disponible."
    exit 1
fi

echo ""
echo "🔓 Déconnexion de Docker Hub..."
podman logout docker.io

if [ $? -eq 0 ]; then
    echo ""
    echo "✅ Application arrêtée avec succès !"
else
    echo ""
    echo "❌ Erreur lors de l'arrêt."
fi
