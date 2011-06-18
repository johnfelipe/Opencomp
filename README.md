Lisez-moi Opencomp
================================

Qu'est-ce qu'Opencomp ?
-----------------------

Opencomp souhaite proposer une alternative au logiciel propriétaire Pronote développé par la société Index Education. En effet, d’une part, les coûts de licence de ce logiciel sont assez élevés et, d’autre part, il n’existe pas de réelle alternative à ce logiciel pour les enseignants du primaire qui évaluent les élèves selon l’acquisition de compétences.


Instructions d'installation
---------------------------

Pour installer Opencomp, suivez les indications suivantes :

* [Téléchargez la dernière version du script](https://github.com/jtraulle/Opencomp/zipball/master)
* Décompressez le dossier
* Transférez le dossier sur votre serveur web
* Assurez vous que le Module de réécriture d'URL Apache est activé sur votre serveur
* Créer une base de donnée MySQL en important le dump SQL `structure.sql` présent à la racine du dossier téléchargé
* Éditez les informations de connexion à la base de données mysql présentes dans le fichier `app\config\database.php` (ligne 84).
* Les identifiants de connexion par défaut sont **admin** pour l'identifiant et **testons** pour le mot de passe.
