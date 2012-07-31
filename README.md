Lisez-moi Opencomp
================================

Qu'est-ce qu'Opencomp ?
-----------------------

Opencomp souhaite proposer une alternative au logiciel propriétaire Pronote développé par la société Index Education. En effet, d’une part, les coûts de licence de ce logiciel sont assez élevés et, d’autre part, il n’existe pas de réelle alternative à ce logiciel pour les enseignants du primaire qui évaluent les élèves selon l’acquisition de compétences.


Sous quelle licence est distribué Opencomp ?
--------------------------------------------

**Opencomp est distribué sous licence _GNU Affero General Public Licence v3_**

>La licence initiale Affero GPL était destinée à assurer aux utilisateurs d'une application web un accès à ses sources. L'Affero GPL version 3 étend cet objectif : elle s'applique à tous les logiciels en réseaux, donc elle s'applique bien aussi aux programmes comme les serveurs de jeux. Les termes supplémentaires sont aussi plus flexibles, donc si quelqu'un utilise des sources sous AGPL dans un programme sans interface réseau, il n'aurait qu'à fournir les sources de la même façon que dans la GPL. En rendant les deux licences compatibles, les développeurs de logiciels seront en mesure de renforcer leur gauche d'auteur tout en capitalisant sur les portions de code mûres à leur disposition sous licence GPL. (_D'après http://www.gnu.org/licenses/quick-guide-gplv3.fr.html_)

<pre>DISCLAIMER: Ce programme est distribué dans l'espoir qu'il sera utile, mais SANS AUCUNE GARANTIE ; sans même la garantie implicite de COMMERCIALISATION ou D’ADAPTATION A UN OBJET PARTICULIER. Pour plus d'informations, reportez vous au fichier LICENCE de l'archive.</pre>

Comment installer Opencomp ?
---------------------------

<pre>Notez que ce logiciel est actuellement en développement et qu'il peut être instable voir ne pas fonctionner du tout.</pre>

Pour installer Opencomp, suivez les indications suivantes :

* [Téléchargez la dernière version du script](https://github.com/jtraulle/Opencomp/zipball/experimental)
* Décompressez le dossier
* Transférez le dossier sur votre serveur web
* Assurez vous que le Module de réécriture d'URL Apache est activé sur votre serveur
* Créer une base de donnée MySQL en important le dump SQL `structure.sql` présent à la racine du dossier téléchargé
* Importez dans votre base de donnée les fichiers `academies_data.sql`, `cycles_levels_data.sql`, `competences_data.sql` présent à la racine du dossier téléchargé
* Éditez les informations de connexion à la base de données mysql présentes dans le fichier `app\Config\database.php` (lignes 62 et suivantes).
* Rapportez vos suggestions et avis sur [le gestionnaire de demandes du projet](https://github.com/jtraulle/Opencomp/issues/new).
