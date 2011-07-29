Lisez-moi Opencomp
================================

Qu'est-ce qu'Opencomp ?
-----------------------

Opencomp souhaite proposer une alternative au logiciel propriétaire Pronote développé par la société Index Education. En effet, d’une part, les coûts de licence de ce logiciel sont assez élevés et, d’autre part, il n’existe pas de réelle alternative à ce logiciel pour les enseignants du primaire qui évaluent les élèves selon l’acquisition de compétences.


Sous quelle licence est distribué Opencomp ?
--------------------------------------------

**Opencomp est distribué sous licence _GNU Affero General Public Licence v3_**

>La licence initiale Affero GPL était destinée à assurer aux utilisateurs d'une application web un accès à ses sources. L'Affero GPL version 3 étend cet objectif : elle s'applique à tous les logiciels en réseaux, donc elle s'applique bien aussi aux programmes comme les serveurs de jeux. Les termes supplémentaires sont aussi plus flexibles, donc si quelqu'un utilise des sources sous AGPL dans un programme sans interface réseau, il n'aurait qu'à fournir les sources de la même façon que dans la GPL. En rendant les deux licences compatibles, les développeurs de logiciels seront en mesure de renforcer leur gauche d'auteur tout en capitalisant sur les portions de code mûres à leur disposition sous licence GPL. (_D'après http://www.gnu.org/licenses/quick-guide-gplv3.fr.html_)

Comment installer Opencomp ?
---------------------------

Pour installer Opencomp, suivez les indications suivantes :

* [Téléchargez la dernière version du script](https://github.com/jtraulle/Opencomp/zipball/master)
* Décompressez le dossier
* Transférez le dossier sur votre serveur web
* Assurez vous que le Module de réécriture d'URL Apache est activé sur votre serveur
* Créer une base de donnée MySQL en important le dump SQL `structure.sql` présent à la racine du dossier téléchargé
* Créer l'utilisateur administrateur pour pouvoir tester l'application en exécutant cette requête SQL :
<pre>
INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `name`, `email`, `role`, `created`) VALUES (1, 'admin', '70454af0546c3c5390733ee0030c0812fe61f61b', 'Administrateur', 'de test', 'admin@test.me', 'enseignant', '2011-07-30 00:00:00');
</pre>
* Éditez les informations de connexion à la base de données mysql présentes dans le fichier `app\config\database.php` (ligne 84).
* Les identifiants de connexion par défaut sont **admin** pour l'identifiant et **testons** pour le mot de passe.
* Rapportez vos suggestions et avis sur [le gestionnaire de demandes du projet](https://github.com/jtraulle/Opencomp/issues/new).
