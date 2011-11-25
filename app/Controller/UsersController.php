
<?php

/**
  * UsersController.php
  *
  * PHP version 5
  *
  * @category Controller
  * @package  Opencomp
  * @author   Jean Traullé <jtraulle@gmail.com>
  * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
  * @link     http://www.opencomp.fr
  */

/**
 * Contrôleur de gestion des compétences.
 *
 * @category Controller
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class UsersController extends AppController
{
    var $paginate = array(
        'User' => array(
            'limit' => 10,
            'order' => array(
                'User.name' => 'Asc',
                'User.first_name' => 'Asc'
            )
        )
    );

    /**
     * Configuration du composant Auth
     *
     * @return void
     * @access public
     */
    public function beforeFilter()
    {
        //parent::beforeFilter();
        //$this->Auth->allow('login');
    }

    /**
     * Méthode listant l'ensemble des utilisateurs.
     *
     * @return void
     * @access public
     */
    public function index()
    {
        $this->set('title_for_layout', __('Liste des utilisateurs'));
        $q = $this->paginate('User');
        $this->set('listedesutilisateurs', $q);
    }


    /**
     * Méthode permettant d'ajouter/éditer un utilisateur.
     *
     * @param int $id Id de l'utilisateur à éditer
     *
     * @return void
     * @access public
     */
    public function edit($id = null)
    {

        //Si le formulaire n'a pas été rempli on tente de le préremplir
        //avec l'id fourni dans le champ hidden
        if (empty($this->request->data)) {
            $this->User->id = $id;
            $this->request->data = $this->User->read();

            //Petite attention, on distingue la modification de l'ajout même
            //si une seule méthode effectue les deux opérations.
            if (!empty($this->request->data['User']['id'])) {
                $this->set('title_for_layout', __('Modifier un utilisateur'));
            } else {
                $this->set('title_for_layout', __('Ajouter un utilisateur'));
            }
        } else {
            // Si le formulaire est rempli, on sauve les données si elles sont
            // valides, et on affiche une confirmation, sinon, on affiche un
            // avertissement invitant les personnes à corriger leur saisie.
            if ($this->User->save($this->request->data)) {
                if (!empty($this->request->data['User']['id'])) {
                    $this->Session->setFlash(__('L\'utilisateur a été édité avec succès !'), 'message_succes');
                    $this->redirect('index');
                } else {
                    $this->Session->setFlash(__('L\'utilisateur a été ajouté avec succès !'), 'message_succes');
                    $this->redirect('index');
                }
            } else {
                //Petite attention, on distingue la modification de l'ajout même
                //si une seule méthode effectue les deux opérations.
                if (!empty($this->request->data['User']['id'])) {
                    $this->set('title_for_layout', __('Modifier un utilisateur'));
                } else {
                    $this->set('title_for_layout', __('Ajouter un utilisateur'));
                }

                $this->Session->setFlash(__('Corrigez les erreurs mentionnées'), 'message_attention');
            }
        }
    }

    /**
     * Méthode permettant de supprimer un utilisateur.
     *
     * @param int $id Identifiant de l'utilisateur à supprimer
     *
     * @return void
     * @access public
     */
    public function delete ($id)
    {
        $utilisateur = $this->User->findById($id);
        $nb_admin = $this->User->find('count', array('conditions' => array('User.role' => 'admin')));

        if ($utilisateur['User']['role'] == 'admin' && $nb_admin == 1) {
            $this->Session->setFlash(__('Vous devez conserver au moins un administrateur pour gérer les utilisateurs !'), 'message_erreur');
            $this->redirect('index');
        } else {
            $this->User->delete($id);
            $this->Session->setFlash(__('L\'utilisateur a été correctement supprimé !'), 'message_succes');
            $this->redirect('index');
        }

    }

    /**
     * Cette méthode permet l'authentification automagique avec CakePHP.
     *
     * @return void
     * @access public
     */
    public function login()
    {
        $this->set('title_for_layout', __('Authentification'));
        $this->layout = 'auth';
        
    }

    /**
     * Cette méthode permet la deconnexion automagique avec CakePHP.
     *
     * @return void
     * @access public
     */
    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }
}

?>
