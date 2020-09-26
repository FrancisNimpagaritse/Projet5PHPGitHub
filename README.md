Installation
Etape 1 : Transférer les fichiers dans le dossier web de votre serveur web (en général "www/").
Etape 2 : Créer une base données sur votre SGDB (MySQL) et importer le fichier myblog.sql situé à la racine du projet pour générer la base de données et les jeux de données de test.
Etape 3 : Remplir le fichier Config/config.php selon les valeurs de votre environnement.
Veillez à bien remplir tout les paramètres comme suit : 
‘DBHOST’, ‘Ici vous mettez le nom de votre host’
‘DNAME’, ‘Ici vous mettez le nom de votre base de données’
‘DB_USER’, ‘Ici vous mettez le nom de votre utilisateur admin’
‘DB_PASSWORD’, ‘Ici vous mettez le mot de passe de l’administrateur  si vous l’avez défini’
‘WEBSITENAME’, ’Ici vous définissez un titre pour votre site’

Dans fichier controllers/HomeController.php, changez et mettez l'adresse email que vous allez utiliser pour la variable $sendTo.

Etape 4 : Votre blog est désormais fonctionnel ! Vous pouvez y créer un compte dans l'onglet "Inscription" sans oublier de cliquer sur le lien de validation de votre email. Ensuite, dans votre base de données et dans la table "users", modifier la colonne "profil" de l'utilisateur que vous venez de créer et mettez y la valeur admin et enregistrer. Vous disposez désormais d'un compte administrateur qui vous permet de gérer votre blog via l’interface d’administration.

Attention ! La protection de répertoires doit être réalisée sous Apache pour bien protéger le dossier Config ainsi que tous les autres dossiers contenant du code qui ne doit pas être accessible par l'utilisateur !