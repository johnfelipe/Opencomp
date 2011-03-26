<?php
/**
 * Install Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class InstallController extends InstallAppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
    public $name = 'Install';

/**
 * No models required
 *
 * @var array
 * @access public
 */
    public $uses = null;

/**
 * No components required
 *
 * @var array
 * @access public
 */
    public $components = null;
/**
 * Default configuration
 *
 * @var array
 * @access public
 */
    public $defaultConfig = array(
        'name' => 'default',
        'driver'=> 'mysql',
        'persistent'=> false,
        'host'=> 'localhost',
        'login'=> 'root',
        'password'=> '',
        'database'=> 'croogo',
        'schema'=> null,
        'prefix'=> null,
        'encoding' => 'UTF8',
        'port' => null,
    );
/**
 * beforeFilter
 *
 * @return void
 * @access public
 */
    public function beforeFilter() {
        parent::beforeFilter();

        $this->layout = 'install';
        App::import('Component', 'Session');
        $this->Session = new SessionComponent;
    }
/**
 * If settings.yml exists, app is already installed
 *
 * @return void
 */
    protected function _check() {
        if (file_exists(CONFIGS . 'settings.yml')) {
            $this->Session->setFlash('Already Installed');
            $this->redirect('/');
        }
    }

/**
 * Step 0: welcome
 *
 * A simple welcome message for the installer.
 *
 * @return void
 * @access public
 */
    public function index() {
        $this->_check();
        $this->set('title_for_layout', __('Installation: Welcome', true));
    }

/**
 * Step 1: database
 *
 * Try to connect to the database and give a message if that's not possible so the user can check their
 * credentials or create the missing database
 * Create the database file and insert the submitted details
 *
 * @return void
 * @access public
 */
    public function database() {
        $this->_check();
        $this->set('title_for_layout', __('Step 1: Database', true));

        if (empty($this->data)) {
            return;
	}

        @App::import('Model', 'ConnectionManager');
        $config = $this->defaultConfig;
        foreach ($this->data['Install'] AS $key => $value) {
            if (isset($this->data['Install'][$key])) {
                $config[$key] = $value;
            }
        }
        @ConnectionManager::create('default', $config);
        $db = ConnectionManager::getDataSource('default');
        if (!$db->isConnected()) {
            $this->Session->setFlash(__('Could not connect to database.', true), 'default', array('class' => 'error'));
            return;
        }

        copy(CONFIGS.'database.php.install', CONFIGS.'database.php');
        App::import('Core', 'File');
        $file = new File(CONFIGS.'database.php', true);
        $content = $file->read();

        foreach ($config AS $configKey => $configValue) {
            $content = str_replace('{default_' . $configKey . '}', $configValue, $content);
        }

        $content = str_replace('{default_host}', $this->data['Install']['host'], $content);
        $content = str_replace('{default_login}', $this->data['Install']['login'], $content);
        $content = str_replace('{default_password}', $this->data['Install']['password'], $content);
        $content = str_replace('{default_database}', $this->data['Install']['database'], $content);

        if($file->write($content) ) {
            return $this->redirect(array('action' => 'data'));
        } else {
            $this->Session->setFlash(__('Could not write database.php file.', true), 'default', array('class' => 'error'));
        }
    }

/**
 * Step 2: Run the initial sql scripts to create the db and seed it with data
 *
 * @return void
 * @access public
 */
    public function data() {
        $this->_check();
        $this->set('title_for_layout', __('Step 2: Build database', true));
        if (isset($this->params['named']['run'])) {
            App::import('Core', 'File');
            App::import('Model', 'CakeSchema', false);
            App::import('Model', 'ConnectionManager');

            $db = ConnectionManager::getDataSource('default');
            if(!$db->isConnected()) {
                $this->Session->setFlash(__('Impossible de se connecter à la base de données.', true), 'default', array('class' => 'error'));
            } else {
                $schema =& new CakeSchema(array('name'=>'app'));
                $schema = $schema->load();
                foreach($schema->tables as $table => $fields) {
                    $create = $db->createSchema($schema, $table);
                    $db->execute($create);
                }

                $dataObjects = App::objects('class', APP . 'config' . DS . 'schema' . DS . 'data' . DS);
                foreach ($dataObjects as $data) {
                    App::import('class', $data, false, APP . 'config' . DS . 'schema' . DS . 'data' . DS);
                    $classVars = get_class_vars($data);
                    $modelAlias = substr($data, 0, -4);
                    $table = $classVars['table'];
                    $records = $classVars['records'];
                    App::import('Model', 'Model', false);
                    $modelObject =& new Model(array(
                        'name' => $modelAlias,
                        'table' => $table,
                        'ds' => 'default',
                    ));
                    if (is_array($records) && count($records) > 0) {
                        foreach($records as $record) {
                            $modelObject->create($record);
                            $modelObject->save();
                        }
                    }
                }

                $this->redirect(array('action' => 'finish'));
            }
        }
    }

/**
 * Etape 3: fin de l'installation
 *
 * Rappeller à l'utilisateur de supprimer le plugin 'install'
 *
 * @return void
 * @access public
 */
    public function finish() {
        $this->set('title_for_layout', __('Installation completed successfully', true));
        if (isset($this->params['named']['delete'])) {
            App::import('Core', 'Folder');
            $this->folder = new Folder;
            if ($this->folder->delete(APP.'plugins'.DS.'install')) {
                $this->Session->setFlash(__('Installation files deleted successfully.', true), 'default', array('class' => 'success'));
                $this->redirect('/');
            } else {
                return $this->Session->setFlash(__('Could not delete installation files.', true), 'default', array('class' => 'error'));
            }
        }
        $this->_check();

        //On définie ici une nouvelle valeur aléatoirement pour le grain de sel de CakePHP
        $File =& new File(CONFIGS . 'core.php');
        if (!class_exists('Security')) {
            require LIBS . 'security.php';
        }
        $salt = Security::generateAuthKey();
        $seed = mt_rand() . mt_rand();
        $contents = $File->read();
        $contents = preg_replace('/(?<=Configure::write\(\'Security.salt\', \')([^\' ]+)(?=\'\))/', $salt, $contents);
        $contents = preg_replace('/(?<=Configure::write\(\'Security.cipherSeed\', \')(\d+)(?=\'\))/', $seed, $contents);
        if (!$File->write($contents)) {
            return false;
        }

        //On importe le modèle Competence pour pouvoir ajouter des
        //enregistrement dans la table correspondante
        $Competence = ClassRegistry::init('Competence');
        $User = ClassRegistry::init('User');
      
        //On crée le premier compte administrateur.
        /*$User->id = $User->field('id', array(
            'username' => 'admin',
            'passwrd' => 'testons'));
        $User->save(); */
        
        //$User->read(null, 1);
        $User->set(array(
            'username' => 'admin',
            'passhache' => Security::hash('testons', null, $salt)
        ));
        $User->save(null,false);

        
        $donnees['competences'] = array(
            array(
                'id' => 6,
                'parent_id' => 5,
                'type' => 1,
                'lft' => 3,
                'rght' => 4,
                'libelle' => "Raconter, décrire, exposer"),
            array(
                'id' => 4,
                'parent_id' => NULL,
                'type' => 1,
                'lft' => 1,
                'rght' => 48,
                'libelle' => "Français"),
            array(
                'id' => 5,
                'parent_id' => 4,
                'type' => 1,
                'lft' => 2,
                'rght' => 9,
                'libelle' => "Langage oral"),
            array(
                'id' => 7,
                'parent_id' => 5,
                'type' => 1,
                'lft' => 5,
                'rght' => 6,
                'libelle' => "Échanger, débattre"),
            array(
                'id' => 8,
                'parent_id' => 5,
                'type' => 1,
                'lft' => 7,
                'rght' => 8,
                'libelle' => "Réciter"),
            array(
                'id' => 9,
                'parent_id' => 4,
                'type' => 1,
                'lft' => 10,
                'rght' => 11,
                'libelle' => "Lecture"),
            array(
                'id' => 10,
                'parent_id' => 4,
                'type' => 1,
                'lft' => 12,
                'rght' => 13,
                'libelle' => "Littérature"),
            array(
                'id' => 11,
                'parent_id' => 4,
                'type' => 1,
                'lft' => 14,
                'rght' => 15,
                'libelle' => "Écriture"),
            array(
                'id' => 12,
                'parent_id' => 4,
                'type' => 1,
                'lft' => 16,
                'rght' => 17,
                'libelle' => "Rédaction"),
            array(
                'id' => 13,
                'parent_id' => 4,
                'type' => 1,
                'lft' => 18,
                'rght' => 27,
                'libelle' => "Vocabulaire"),
            array(
                'id' => 14,
                'parent_id' => 13,
                'type' => 1,
                'lft' => 19,
                'rght' => 20,
                'libelle' => "Acquisition du vocabulaire"),
            array(
                'id' => 15,
                'parent_id' => 13,
                'type' => 1,
                'lft' => 21,
                'rght' => 22,
                'libelle' => "Maîtrise du sens des mots"),
            array(
                'id' => 16,
                'parent_id' => 13,
                'type' => 1,
                'lft' => 23,
                'rght' => 24,
                'libelle' => "Les familles de mots"),
            array(
                'id' => 17,
                'parent_id' => 13,
                'type' => 1,
                'lft' => 25,
                'rght' => 26,
                'libelle' => "Utilisation du dictionnaire"),
            array(
                'id' => 18,
                'parent_id' => 4,
                'type' => 1,
                'lft' => 28,
                'rght' => 39,
                'libelle' => "Grammaire"),
            array(
                'id' => 19,
                'parent_id' => 18,
                'type' => 1,
                'lft' => 29,
                'rght' => 30,
                'libelle' => "La phrase"),
            array(
                'id' => 20,
                'parent_id' => 18,
                'type' => 1,
                'lft' => 31,
                'rght' => 32,
                'libelle' => "Les classes de mots"),
            array(
                'id' => 21,
                'parent_id' => 18,
                'type' => 1,
                'lft' => 33,
                'rght' => 34,
                'libelle' => "Les fonctions"),
            array(
                'id' => 22,
                'parent_id' => 18,
                'type' => 1,
                'lft' => 35,
                'rght' => 36,
                'libelle' => "Le verbe"),
            array(
                'id' => 23,
                'parent_id' => 18,
                'type' => 1,
                'lft' => 37,
                'rght' => 38,
                'libelle' => "Les accords"),
            array(
                'id' => 24,
                'parent_id' => 4,
                'type' => 1,
                'lft' => 40,
                'rght' => 47,
                'libelle' => "Orthographe"),
            array(
                'id' => 25,
                'parent_id' => 24,
                'type' => 1,
                'lft' => 41,
                'rght' => 42,
                'libelle' => "Compétences grapho-phonétiques"),
            array(
                'id' => 26,
                'parent_id' => 24,
                'type' => 1,
                'lft' => 43,
                'rght' => 44,
                'libelle' => "Orthographe grammaticale"),
            array(
                'id' => 27,
                'parent_id' => 24,
                'type' => 1,
                'lft' => 45,
                'rght' => 46,
                'libelle' => "Orthographe lexicale"),
            array(
                'id' => 28,
                'parent_id' => NULL,
                'type' => 1,
                'lft' => 49,
                'rght' => 86,
                'libelle' => "Mathématiques"),
            array(
                'id' => 29,
                'parent_id' => 28,
                'type' => 1,
                'lft' => 50,
                'rght' => 67,
                'libelle' => "Nombres et calcul"),
            array(
                'id' => 30,
                'parent_id' => 29,
                'type' => 1,
                'lft' => 51,
                'rght' => 52,
                'libelle' => "Les nombres entiers jusqu'au million"),
            array(
                'id' => 31,
                'parent_id' => 29,
                'type' => 1,
                'lft' => 53,
                'rght' => 54,
                'libelle' => "Les nombres entiers jusqu'au milliard"),
            array(
                'id' => 32,
                'parent_id' => 29,
                'type' => 1,
                'lft' => 55,
                'rght' => 56,
                'libelle' => "Fractions"),
            array(
                'id' => 33,
                'parent_id' => 29,
                'type' => 1,
                'lft' => 57,
                'rght' => 58,
                'libelle' => "Nombres décimaux"),
            array(
                'id' => 34,
                'parent_id' => 29,
                'type' => 1,
                'lft' => 59,
                'rght' => 66,
                'libelle' => "Calcul sur des nombres entiers"),
            array(
                'id' => 35,
                'parent_id' => 34,
                'type' => 1,
                'lft' => 60,
                'rght' => 61,
                'libelle' => "Calculer mentalement"),
            array(
                'id' => 36,
                'parent_id' => 34,
                'type' => 1,
                'lft' => 62,
                'rght' => 63,
                'libelle' => "Effectuer un calcul posé"),
            array(
                'id' => 37,
                'parent_id' => 34,
                'type' => 1,
                'lft' => 64,
                'rght' => 65,
                'libelle' => "Problèmes"),
            array(
                'id' => 38,
                'parent_id' => 28,
                'type' => 1,
                'lft' => 68,
                'rght' => 75,
                'libelle' => "Géométrie"),
            array(
                'id' => 39,
                'parent_id' => 38,
                'type' => 1,
                'lft' => 69,
                'rght' => 70,
                'libelle' => "Dans le plan"),
            array(
                'id' => 40,
                'parent_id' => 38,
                'type' => 1,
                'lft' => 71,
                'rght' => 72,
                'libelle' => "Dans l'espace"),
            array(
                'id' => 41,
                'parent_id' => 38,
                'type' => 1,
                'lft' => 73,
                'rght' => 74,
                'libelle' => "Problèmes de reproduction, de construction"),
            array(
                'id' => 42,
                'parent_id' => 28,
                'type' => 1,
                'lft' => 76,
                'rght' => 83,
                'libelle' => "Grandeurs et mesures"),
            array(
                'id' => 43,
                'parent_id' => 42,
                'type' => 1,
                'lft' => 77,
                'rght' => 78,
                'libelle' => "Aires"),
            array(
                'id' => 44,
                'parent_id' => 42,
                'type' => 1,
                'lft' => 79,
                'rght' => 80,
                'libelle' => "Angles"),
            array(
                'id' => 45,
                'parent_id' => 42,
                'type' => 1,
                'lft' => 81,
                'rght' => 82,
                'libelle' => "Problèmes"),
            array(
                'id' => 46,
                'parent_id' => 28,
                'type' => 1,
                'lft' => 84,
                'rght' => 85,
                'libelle' => "Organisation et gestion de données"),
            array(
                'id' => 47,
                'parent_id' => NULL,
                'type' => 1,
                'lft' => 87,
                'rght' => 96,
                'libelle' => "Éducation Physique et Sportive"),
            array(
                'id' => 48,
                'parent_id' => 47,
                'type' => 1,
                'lft' => 88,
                'rght' => 89,
                'libelle' => "Réaliser une performance mesurée (distance, temps)"),
            array(
                'id' => 49,
                'parent_id' => 47,
                'type' => 1,
                'lft' => 90,
                'rght' => 91,
                'libelle' => "Adapter ses déplacements à différents types d'environnements"),
            array(
                'id' => 50,
                'parent_id' => 47,
                'type' => 1,
                'lft' => 92,
                'rght' => 93,
                'libelle' => "Coopérer et s'opposer individuellement et collectivement"),
            array(
                'id' => 51,
                'parent_id' => 47,
                'type' => 1,
                'lft' => 94,
                'rght' => 95,
                'libelle' => "Concevoir et réaliser des actions à visées expressive, artistique, esthétique"),
            array(
                'id' => 52,
                'parent_id' => NULL,
                'type' => 1,
                'lft' => 97,
                'rght' => 98,
                'libelle' => "Langue vivante"),
            array(
                'id' => 53,
                'parent_id' => NULL,
                'type' => 1,
                'lft' => 99,
                'rght' => 116,
                'libelle' => "Sciences expérimentales et technologie"),
            array(
                'id' => 54,
                'parent_id' => 53,
                'type' => 1,
                'lft' => 100,
                'rght' => 101,
                'libelle' => "Le ciel et la terre"),
            array(
                'id' => 55,
                'parent_id' => 53,
                'type' => 1,
                'lft' => 102,
                'rght' => 103,
                'libelle' => "La matière"),
            array(
                'id' => 56,
                'parent_id' => 53,
                'type' => 1,
                'lft' => 104,
                'rght' => 105,
                'libelle' => "L'énergie"),
            array(
                'id' => 57,
                'parent_id' => 53,
                'type' => 1,
                'lft' => 106,
                'rght' => 107,
                'libelle' => "L'unité et la diversité du vivant"),
            array(
                'id' => 58,
                'parent_id' => 53,
                'type' => 1,
                'lft' => 108,
                'rght' => 109,
                'libelle' => "Le fonctionnement du vivant"),
            array(
                'id' => 59,
                'parent_id' => 53,
                'type' => 1,
                'lft' => 110,
                'rght' => 111,
                'libelle' => "Le fonctionnement du corps humain et la santé"),
            array(
                'id' => 60,
                'parent_id' => 53,
                'type' => 1,
                'lft' => 112,
                'rght' => 113,
                'libelle' => "Les êtres vivants dans leur environnement"),
            array(
                'id' => 61,
                'parent_id' => 53,
                'type' => 1,
                'lft' => 114,
                'rght' => 115,
                'libelle' => "Les objets techniques"),
            array(
                'id' => 62,
                'parent_id' => NULL,
                'type' => 1,
                'lft' => 117,
                'rght' => 164,
                'libelle' => "Culture humaniste"),
            array(
                'id' => 63,
                'parent_id' => 62,
                'type' => 1,
                'lft' => 118,
                'rght' => 131,
                'libelle' => "Histoire"),
            array(
                'id' => 64,
                'parent_id' => 63,
                'type' => 1,
                'lft' => 119,
                'rght' => 120,
                'libelle' => "La Préhistoire"),
            array(
                'id' => 65,
                'parent_id' => 63,
                'type' => 1,
                'lft' => 121,
                'rght' => 122,
                'libelle' => "L'Antiquité"),
            array(
                'id' => 66,
                'parent_id' => 63,
                'type' => 1,
                'lft' => 123,
                'rght' => 124,
                'libelle' => "Le Moyen Âge"),
            array(
                'id' => 67,
                'parent_id' => 63,
                'type' => 1,
                'lft' => 125,
                'rght' => 126,
                'libelle' => "Les temps modernes"),
            array(
                'id' => 68,
                'parent_id' => 63,
                'type' => 1,
                'lft' => 127,
                'rght' => 128,
                'libelle' => "La Révolution française et le XIXème siècle"),
            array(
                'id' => 69,
                'parent_id' => 63,
                'type' => 1,
                'lft' => 129,
                'rght' => 130,
                'libelle' => "Le XXème siècle et notre époque"),
            array(
                'id' => 70,
                'parent_id' => 62,
                'type' => 1,
                'lft' => 132,
                'rght' => 145,
                'libelle' => "Géographie"),
            array(
                'id' => 72,
                'parent_id' => 70,
                'type' => 1,
                'lft' => 133,
                'rght' => 134,
                'libelle' => "Des réalités géographiques locales à la région où vivent les élèves"),
            array(
                'id' => 73,
                'parent_id' => 70,
                'type' => 1,
                'lft' => 135,
                'rght' => 136,
                'libelle' => "Le territoire français dans l'Union Européenne"),
            array(
                'id' => 74,
                'parent_id' => 70,
                'type' => 1,
                'lft' => 137,
                'rght' => 138,
                'libelle' => "Les français dans le contexte européen"),
            array(
                'id' => 75,
                'parent_id' => 70,
                'type' => 1,
                'lft' => 139,
                'rght' => 140,
                'libelle' => "Se déplacer en France et en Europe"),
            array(
                'id' => 76,
                'parent_id' => 70,
                'type' => 1,
                'lft' => 141,
                'rght' => 142,
                'libelle' => "Produire en France"),
            array(
                'id' => 77,
                'parent_id' => 70,
                'type' => 1,
                'lft' => 143,
                'rght' => 144,
                'libelle' => "La France dans le monde"),
            array(
                'id' => 78,
                'parent_id' => 62,
                'type' => 1,
                'lft' => 146,
                'rght' => 151,
                'libelle' => "Pratiques artistiques"),
            array(
                'id' => 79,
                'parent_id' => 78,
                'type' => 1,
                'lft' => 147,
                'rght' => 148,
                'libelle' => "Arts visuels"),
            array(
                'id' => 80,
                'parent_id' => 78,
                'type' => 1,
                'lft' => 149,
                'rght' => 150,
                'libelle' => "Éducation musicale"),
            array(
                'id' => 81,
                'parent_id' => 62,
                'type' => 1,
                'lft' => 152,
                'rght' => 163,
                'libelle' => "Histoire de l'art"),
            array(
                'id' => 82,
                'parent_id' => 81,
                'type' => 1,
                'lft' => 153,
                'rght' => 154,
                'libelle' => "La Préhistoire et l'Antiquité Gallo-Romaine"),
            array(
                'id' => 83,
                'parent_id' => 81,
                'type' => 1,
                'lft' => 155,
                'rght' => 156,
                'libelle' => "Le Moyen Âge"),
            array(
                'id' => 84,
                'parent_id' => 81,
                'type' => 1,
                'lft' => 157,
                'rght' => 158,
                'libelle' => "Les temps modernes"),
            array(
                'id' => 85,
                'parent_id' => 81,
                'type' => 1,
                'lft' => 159,
                'rght' => 160,
                'libelle' => "Le XIXème siècle"),
            array(
                'id' => 86,
                'parent_id' => 81,
                'type' => 1,
                'lft' => 161,
                'rght' => 162,
                'libelle' => "Le XXème siècle et notre époque"),
            array(
                'id' => 87,
                'parent_id' => NULL,
                'type' => 1,
                'lft' => 165,
                'rght' => 166,
                'libelle' => "Techniques Usuelles de l'Information et de la Communication"),
            array(
                'id' => 88,
                'parent_id' => NULL,
                'type' => 1,
                'lft' => 167,
                'rght' => 168,
                'libelle' => "Instruction civique et morale")
        );
        
       //Comme on souhaite peupler l'arbre de manière manuelle lors de
       //la web-installation, on désactive le comportement Tree, sinon
       //ce dernier ne nous laissera pas ajouter des données dans la base
       //manuellement.
       $Competence->Behaviors->disable('Tree');
       $Competence->saveAll($donnees['competences'],array('validate' => false));

    }

}
?>