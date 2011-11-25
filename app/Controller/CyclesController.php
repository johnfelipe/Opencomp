
<?php

/**
  * CyclesController.php
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
 * Contrôleur de gestion des cycles.
 *
 * @category Controller
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class CyclesController extends AppController
{
    /**
    * Méthode permettant de visionner l'ensemble des cycles.
    * 
    * @return void
    * @access public
    */
    public function index()
    {
        $this->Cycle->recursive = 0;
        $this->set('title_for_layout', __('Cycles d\'apprentissage'));
        $this->set('cycles', $this->paginate());
    }
    
    /**
    * Méthode permettant d'ajouter un cycle.
    * 
    * @return void
    * @access public
    */
    public function add()
    {
        $this->set('title_for_layout', __('Ajouter un cycle d\'apprentissage'));

        if (!empty($this->request->data)) {
            $this->Cycle->create();
            if ($this->Cycle->save($this->request->data)) {
                $this->Session->setFlash(__('Le cycle d\'apprentissage a été ajouté.'), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Le cycle d\'apprentissage n\'a pas pu être ajouté.'), 'message_erreur');
            }
        }
    }
    
    /**
    * Méthode permettant d'éditer un cycle.
    *
    * @param int $id Identifiant du cycle à éditer.
    * 
    * @return void
    * @access public
    */
    public function edit($id = null)
    {
        if (!$id && empty($this->request->data)) {
            $this->redirect(array('action' => 'index'));
        }

        if (!empty($this->request->data)) {
            if ($this->Cycle->save($this->request->data)) {
                $this->Session->setFlash(__('Le cycle d\'apprentissage a été sauvegardé.'), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Le cycle d\'apprentissage n\'a pas pu être édité.'), 'message_erreur');
            }
        }

        if (empty($this->request->data)) {
            $this->request->data = $this->Cycle->read(null, $id);

            if (empty($this->request->data)) {
                $this->Session->setFlash(__('Le cycle d\'apprentissage que vous souhaitez éditer n\'existe pas.'), 'message_erreur');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
    * Méthode permettant de supprimer un cycle.
    *
    * @param int $id Identifiant du cycle à supprimer.
    * 
    * @return void
    * @access public
    */
    public function delete($id)
    {
        if (!$id) {
            $this->redirect(array('action'=>'index'));
        }

        if ($this->Cycle->delete($id)) {
            $this->Session->setFlash(__('Le cycle d\'apprentissage a été supprimé.'), 'message_succes');
            $this->redirect(array('action'=>'index'));
        }

        $this->Session->setFlash(__('Le cycle d\'apprentissage que vous souhaitez supprimer n\'existe pas.'), 'message_erreur');
        $this->redirect(array('action' => 'index'));
    }    
}
?>
