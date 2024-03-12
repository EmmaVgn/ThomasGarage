# ThomasGarage (Projet pour le diplome DWWM)

On clone le dépot!
git clone https://github.com/EmmaVgn/ThomasGarage.git

On se déplace dans le dossier
cd. ThomasGarage-main

On installe les dépendances
composer install
npm install

Les dépendances supplémentaires
npm install nouislider
composer require beberlei/doctrineextensions

On crée notre base de données
php bin/console doctrine:database:create

On exécute les migrations
php bin/console doctrine:migrations:migrate

Puis on éxécute les fixtures
php bin/console doctrine:fixtures:load --no-interaction

Puis, on lance le serveur
Symfony serve

# ThomasGarage
