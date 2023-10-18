# Garage-Parrot Project

INSTALLATION :

1/ Faire une reproduction du dépôt git avec la commande dans votre console :
  gh repo clone vcedricc/Garage-Parrot

2/ Modifier les fichiers, afin de les personnalisés en fonctions de vos besoins (adresses de votre site) :
  -a/ .htaccess ;
  -b/ robots.txt ;
  -c/ sitemap.xml.

3/ Placer les fichier sur votre serveur local ou distant, à l'exception des fichier :
  -a/ .htaccess.txt (avant de placer ce fichier vérifier la compatibilité avec votre serveur) ;
  -b/ 1-Charte graphique.png ;
  -c/ 2-Diagramme utilisateurs.png ;
  -d/ 3-Diagramme BDD.png ;
  -e/ 4-Lignes commandes BDD.txt.

4/ Télécharger HTML Purifier sur le site officiel (htmlpurifier.org) et dézipper le fichier à la source de votre site web.

5/ Procéder à la configuration de votre Base De Données (BDD)  :
  -a/ soit avec la commande :
  mysql -u[utilisateur] -p[mot_de_passe] [nom_base_de_donnees] < parrot.sql
  -b/ soit en utilisant la fonction "Importer" de PhpMyAdmin si vous utilisez MySQL ;
  -c/ soit en reprenant les lignes de commandes figurant dans le fichier "4-Lignes de commandes BDD.txt" dans la console de votre BDD.

6/ Vérifier le fonctionnement du site
  Si celui-ci fonctionne, vous pouvez essayer de rajouter le fichier ".htaccess.txt" sur le serveur.
  Dans le cas d'une anomalie après le dépôt de ce fichier (en général un problème d'accès au site), le supprimer de votre serveur.

7/ Aller dans l'interface administrateur :
  A partir de votre navigateur, aller dans le répertoire /admin ;
  Connecter vous à l'interface en tant qu'administrateur :
    - Identifiant : Admin ;
    - Mot de passe : MP.
  
8/ Changer les identifiants et mots de passe des comptes "Admin" et "User" dans la partie "Gestion des comptes".

-------------------------------------------------------------------------------------------------------------------

INSTALLATION :

1/ Make a reproduction of the git repository with the command in your console:
  gh repo clone vcedricc/Garage-Parrot

2/ Modify the files, in order to customize them according to your needs (addresses of your site):
  -a/.htaccess;
  -b/robots.txt;
  -c/sitemap.xml.

3/ Place the files on your local or remote server, except for the files:
  -a/ .htaccess.txt (before placing this file check compatibility with your server);
  -b/ 1-Graphic charter.png;
  -c/2-Users Diagram.png;
  -d/ 3-BDD Diagram.png;
  -e/ 4-Line commands BDD.txt.

4/ Download HTML Purifier from the official website (htmlpurifier.org) and unzip the file at the source of your website.

5/ Proceed with the configuration of your Database (BDD):
  -a/ either with the command:
  mysql -u[user] -p[password] [database_name] < parrot.sql
  -b/ either by using the "Import" function of PhpMyAdmin if you are using MySQL;
  -c/ or by using the command lines appearing in the file "4-BDD command lines.txt" in the console of your BDD.

6/ Check the operation of the site
  If it works, you can try adding the ".htaccess.txt" file to the server.
  In the case of an anomaly after the deposit of this file (generally a problem of access to the site), delete it from your server.

7/ Go to the administrator interface:
  From your browser, go to the /admin directory;
  Log in to the interface as an administrator:
    - Login: Admin;
    - Password: PM.
  
8/ Change the identifiers and passwords of the "Admin" and "User" accounts in the "Gestion des comptes" section.
