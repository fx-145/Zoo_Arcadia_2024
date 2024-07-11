Démarche à suivre pour le déploiement en local:
=> Prérequis: sont installées des versions récentes sur ce pc de:
PHP
GIT
XAMPP (avec les composants apache et Mysql)
VISUAL STUDIO CODE
COMPOSER
NODEJS

1. Créer le répertoire et initialiser git
=> Créer le répertoire de stockage du projet: "ZOOARCADIA2024"
=> Depuis le terminal, à l'adresse de ce répertoire, exécuter la commande git init
=> Créer le fichier README.md dans lequel les infos sur le déploiement en local sont expliquées.
=> Créer un dépôt Git distant, et le relier au dépôt git local.


2. Créer et nommer la base de données relationnelle MariaDB, la configurer.
=> Cliquer sur le bouton "Admin" de MySQL et accéder à l'adresse:  http://localhost/phpmyadmin pour visualiser les bases de données.

=> Lancer le Shell depuis le Xampp control Panel: on accède au mariaDB monitor.
A l'invite, indiquer "mysql -u root -p", puis cliquer sur "entrée" à l'invite du mot de passe.
-u indique que l'on va connecter un utilisateur. "root" est le nom d'utilisateur-administrateur par défaut.

=> Créer la base de données relationnelle MariaDB via le shell de Xampp:
Créer la base de données avec la commande "create database zoo_arcadia;"
(La base de données "zoo_arcadia" est installée dans le répertoire "C:\xampp\mysql\data\")
Se positionner sur la base de données avec la commande "use zoo_arcadia;"

=> Dans le répertoire "config", créer le fichier "Database" qui contient le code de connexion à la base de données SQL MariaDB (port 3306 en local).

=> Cliquer sur "Start" au niveau de "Apache" et Mysql".
=> encapsuler le code de connexion dans la classe "Database". Intégrer les options PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION par mesure de sécurité, c'est un tableau qui contient un mode d'erreur pour le PDO. Afin de lever une exception en cas d'erreur, ce qui facilite le débogage.

3. Configurer et utiliser Visual Studio Code pour développer le projet.
=> Installer les extensions:
PHP Intelephense
PHP Server: pour afficher la page requise

4. Créer et nommer la base de données NoSQl MongoDB
=> Aller sur le site "https://pecl.php.net/package/mongodb", télécharger la dernière version de fichier DLL compatible (vérifier la version de php installée) avec la version de php installée sur le pc.
=> Placer ce fichier téléchargé dans le répertoire: "C:\xampp\php\ext"
=> Puis mettre à jour le fichier php.ini, en rajoutant la ligne de code: "extension=mongodb", au niveau
de l'indication des extensions de fichiers library. Sans le ";".
=> Télécharger depuis le site Mongodb.com, le mongodb Community Server en version "zip".
=> Extraire le fichier zip et renommer le dossier bin en "MongoDB" et le coller dans c:\xampp\"
=> Redémarrer xampp, et en cliquant sur le bouton "admin" sur la ligne apache de xampp, on visualise que MongoDB est pris en charge.
=> installer le mongoDB shell (activation en exécutant "mongosh" depuis le terminal)
=> installer le mongoDb Compass pour visualiser les changements sur la base de données: création de la collection "views".
=> exécuter depuis le terminal la commande composer require mongodb/mongodb pour installer les dépendances nécessaires 
pour le package mongodb dans le projet.
=> Dans le répertoire "config", créer le fichier "DatabaseNoSql" qui contient le code de connexion à la base de données Not Only Sql (port 27017 en local).



