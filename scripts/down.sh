echo "IMPORTANT: Si la commande ne marche pas, et que vous êtes sur les PC de l'IUT, enelvez le - entre podman et compose"
echo "Si vous êtes chez vous, remplacez 'podman compose' par 'podman-compose' (avec le - entre les 2)"
podman-compose down
podman logout docker.io
