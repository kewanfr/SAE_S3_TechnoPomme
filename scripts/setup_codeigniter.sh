echo "Changement de dossier vers le framework codeigniter"
cd ../codeigniter4-framework-68d1a58
echo "lancement de composer"
composer install

echo "migration de la base de données"
php spark migrate

echo "CodeIgniter4 est prêt à être utilisé"
