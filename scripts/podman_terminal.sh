#!/bin/bash
# Ouvre un terminal dans le conteneur PHP avec Podman

echo "🖥️  Connexion au conteneur PHP..."
echo "   Tapez 'exit' pour quitter le conteneur."
echo ""

podman exec -it php /bin/bash
