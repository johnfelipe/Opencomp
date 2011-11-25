<?php
App::uses('AppController', 'Controller');
/**
  * PeriodsController.php
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
 * Contrôleur de gestion des périodes scolaires.
 *
 * @category Controller
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class PeriodsController extends AppController
{

    public $helpers = array('Time');

    /**
    * Méthode permettant de visionner l'ensemble des périodes scolaires.
    * 
    * @return void
    * @access public
    */
    public function index()
    {
        $this->Period->recursive = 0;
        $this->set('title_for_layout', __('Périodes scolaires'));
        $this->set('periods', $this->paginate());
    }
    
    /**
    * Méthode permettant d'ajouter une période scolaire.
    * 
    * @return void
    * @access public
    */
    public function add()
    {
        $this->set('title_for_layout', __('Ajouter une période scolaire'));

        //On transmet à la vue la liste des années et des établissements.
        $this->set('years', $this->Period->Year->find('list'));
        $this->set('establishments', $this->Period->Establishment->find('list'));

        if ($this->request->is('post')) {
            $this->Period->create();
            if ($this->Period->save($this->request->data)) {
                $this->Session->setFlash(__('La période scolaire a été ajoutée.'), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La période scolaire n\'a pas pu être ajoutée.'), 'message_erreur');
            }
        }
    }

    /**
    * Méthode permettant d'éditer une période scolaire.
    *
    * @param int $id Identifiant de la période scolaire à éditer.
    * 
    * @return void
    * @access public
    */
    public function edit($id = null)
    {

        //On transmet à la vue la liste des années et des établissements.
        $this->set('years', $this->Period->Year->find('list'));
        $this->set('establishments', $this->Period->Establishment->find('list'));
        
        if (!$id && empty($this->request->data)) {
            $this->redirect(array('action' => 'index'));
        }

        if (!empty($this->request->data)) {
            if ($this->Period->save($this->request->data)) {
                $this->Session->setFlash(__('La période scolaire a été sauvegardée.'), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Le période scolaire n\'a pas pu être éditée.'), 'message_erreur');
            }
        }

        if (empty($this->request->data)) {
            $this->request->data = $this->Period->read(null, $id);

            if (empty($this->request->data)) {
                $this->Session->setFlash(__('La période scolaire que vous souhaitez éditer n\'existe pas.'), 'message_erreur');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
    * Méthode permettant de supprimer une période scolaire.
    *
    * @param int $id Identifiant de l'établissement scolaire à supprimer.
    * 
    * @return void
    * @access public
    */
    public function delete ($id)
    {
        if (!$id) {
            $this->redirect(array('action'=>'index'));
        }

        if ($this->Period->delete($id)) {
            $this->Session->setFlash(__('La période scolaire a été supprimée.'), 'message_succes');
            $this->redirect(array('action'=>'index'));
        }

        $this->Session->setFlash(__('La période que vous souhaitez supprimer n\'existe pas.'), 'message_erreur');
        $this->redirect(array('action' => 'index'));
    }

}
?>