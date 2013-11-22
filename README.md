#### Métriques <sub>[ [Qualité](http://fr.wikipedia.org/wiki/Qualit%C3%A9_logicielle), résultat des [tests unitaires](http://fr.wikipedia.org/wiki/Tests_unitaires), [couverture de code](http://fr.wikipedia.org/wiki/Couverture_de_code) ]</sub>

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/jtraulle/Opencomp/badges/quality-score.png?s=859c94800aa2944a4d17493ba0cd00da9d4c6f45)](https://scrutinizer-ci.com/g/jtraulle/Opencomp/)

----

Opencomp souhaite proposer aux enseignants du primaire qui évaluent les élèves selon l’acquisition de compétences une solution simple, rapide et fiable pour leur permettre de générer aisément les bulletins de leurs élèves.

----

Installation
------------

**_<pre>Notez que ce logiciel est actuellement en développement et qu'il peut être instable voir ne pas fonctionner du tout.</pre>_**

Pour installer Opencomp, suivez les indications suivantes :

### 1. Télécharger, décompresser, configurer Apache

* [Téléchargez la dernière version du script](https://codeload.github.com/jtraulle/Opencomp/zip/develop).
* Décompressez et transférez le dossier sur votre serveur web.
* Assurez vous que le Module de réécriture d'URL Apache (mod_rewrite) est activé sur votre serveur

### 2. Installer les dépendances backend (Composer)

*Il s'agit des librairies PHP sur lesquelles repose Opencomp pour fonctionner*

* Téléchargez le gestionnaire de dépendances backend Composer `curl -sS https://getcomposer.org/installer | php`
* Récupérez l'ensemble des dépendances en exécutant `php composer.phar install`

### 3. Installer les dépendances frontend (Bower)

*Il s'agit des librairies Javascript et CSS utilisées pour la mise en forme, l'interactivité et les styles de l'application*

* Téléchargez et installez Node pour votre Système d'exploitation depuis http://nodejs.org/download/
* Téléchargez le gestionnaire de dépendances frontend Bower à l'aide de npm `npm install -g bower`
* Récupérez l'ensemble des dépendances en exécutant `bower install`

### 4. Créer et configurer la base de données 

* Créer une base de donnée MySQL en important les dumps SQL `struct.sql` et `data.sql` présents dans le répertoire `app/Model/Datasource/` du dossier téléchargé.
* Éditez les informations de connexion à la base de données MySQL présentes dans le fichier `app/Config/database.php` (lignes 62 et suivantes).

### 5. Profitez !

* Accédez à votre serveur web, les identifiants par défaut sont admin/admin.
* Rapportez vos suggestions et avis sur [le gestionnaire de demandes du projet](http://projets.opencomp.fr/opencomp/issues/new).
 
Licence
-------

**Opencomp est distribué sous licence _GNU Affero General Public Licence v3_**

>La licence initiale Affero GPL était destinée à assurer aux utilisateurs d'une application web un accès à ses sources. L'Affero GPL version 3 étend cet objectif : elle s'applique à tous les logiciels en réseaux, donc elle s'applique bien aussi aux programmes comme les serveurs de jeux. Les termes supplémentaires sont aussi plus flexibles, donc si quelqu'un utilise des sources sous AGPL dans un programme sans interface réseau, il n'aurait qu'à fournir les sources de la même façon que dans la GPL. En rendant les deux licences compatibles, les développeurs de logiciels seront en mesure de renforcer leur gauche d'auteur tout en capitalisant sur les portions de code mûres à leur disposition sous licence GPL. (_D'après http://www.gnu.org/licenses/quick-guide-gplv3.fr.html_)

<pre>Ce programme est distribué dans l'espoir qu'il sera utile, mais SANS AUCUNE GARANTIE ; 
sans même la garantie implicite de COMMERCIALISATION ou D’ADAPTATION A UN OBJET PARTICULIER. 

Pour plus d'informations, reportez vous au fichier LICENCE.txt de l'archive.</pre>
