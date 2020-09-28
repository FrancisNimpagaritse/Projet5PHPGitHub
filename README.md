Projet 5 - Blog en PHP MVC POO
==============================
Dans mon parcours de Développeur d'application PHP/Symfony chez OpenClassrooms j'ai crée ce blog professionnel en PHP 7.1 en se servant d'une architecture MVC et du paradigme Orienté Objet, le tout basé sur une base de données MySQL 5.6.  

Informations générales
---------------------------  
L'aboutissement de ce projet a été possible grâce aux nombreux cours disponibles sur la plateforme d'OpenClassrooms ainsi que d'autres documentations disponibles sur le web.  

Le thème Bootstrap utilisé est Clean Blog crée par Colorlib. Plus d'informations 

Installation
-------------- 

* Etape 1

Transférer les fichiers dans le dossier web de votre serveur web (en général "www/").

* Etape 2

Créer une base données sur votre SGDB (MySQL) et importer le fichier myblog.sql situé à la racine du projet pour générer la base de données et les jeux de données de test.

* Etape 3

Installer toutes les dépendances du projet

* Etape 4

Remplir le fichier .env selon les valeurs de votre environnement.

Veillez à bien remplir tout les paramètres comme suit :

> ‘DBHOST’, ‘Ici vous mettez le nom de votre host’

> ‘DNAME’, ‘Ici vous mettez le nom de votre base de données’

> ‘DB_USER’, ‘Ici vous mettez le nom de votre utilisateur admin’

>‘DB_PASSWORD’, ‘Ici vous mettez le mot de passe de l’administrateur si vous l’avez défini’

>‘WEBSITENAME’, ’Ici vous définissez un titre pour votre site’
  

Dans fichier controllers/HomeController.php, changez et mettez l'adresse email que vous allez utiliser pour la variable *$sendTo*.
  

* Etape 4
 Votre blog est désormais fonctionnel ! Vous pouvez y créer un compte dans l'onglet "Inscription" sans oublier de cliquer sur le lien de validation de votre email. Ensuite, dans votre base de données et dans la table "users", modifier la colonne "profil" de l'utilisateur que vous venez de créer et mettez y la valeur admin et enregistrer. Vous disposez désormais d'un compte administrateur qui vous permet de gérer votre blog via l’interface d’administration.  

Attention ! La protection de répertoires doit être réalisée sous Apache pour bien protéger le dossier Config ainsi que tous les autres dossiers contenant du code qui ne doit pas être accessible par l'utilisateur !

Bon travail
-------------