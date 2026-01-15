#!/bin/bash
# Ouvre un terminal dans le conteneur PHP avec Docker

echo "🖥️  Connexion au conteneur PHP..."
echo "   Tapez 'exit' pour quitter le conteneur."
echo ""

docker exec -it php /bin/bash
