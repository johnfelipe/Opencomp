
<?php

/**
  * LevelsController.php
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
 * Contrôleur de gestion des niveaux scolaires
 *
 * @category Controller
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class LevelsController extends AppController
{
    
    /**
     * Méthode listant l'ensemble des niveaux scolaires existants.
     *
     * @return void
     * @access public
     */
    public function index()
    {
        $this->Level->recursive = 0;
        $this->set('title_for_layout', __('Niveaux', true));
        $this->set('levels', $this->paginate());
    }
    
    /**
     * Méthode permettant d'ajouter un niveau scolaire.
     *
     * @return void
     * @access public
     */
    public function add()
    {
        //On transmet à la vue la liste des cycles.
        $this->set('cycles', $this->Level->Cycle->find('list'));

        $this->set('title_for_layout', __('Ajouter un niveau', true));

        if (!empty($this->request->data)) {
            $this->Level->create();
            if ($this->Level->save($this->request->data)) {
                $this->Session->setFlash(__('Le niveau a été ajouté.', true), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Le niveau n\'a pas pu être ajouté.', true), 'message_erreur');
            }
        }
    }
    
    /**
     * Méthode permettant d'éditer un niveau scolaire.
     *
     * @param int $id L'identifiant du niveau à éditer.
     *
     * @return void 
     * @access public
     */
    public function edit($id = null)
    {
        //On transmet à la vue la liste des cycles.
        $this->set('cycles', $this->Level->Cycle->find('list'));

        if (!$id && empty($this->request->data)) {
            $this->redirect(array('action' => 'index'));
        }

        if (!empty($this->request->data)) {
            if ($this->Level->save($this->request->data)) {
                $this->Session->setFlash(__('Le niveau a été sauvegardé.', true), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Le niveau n\'a pas pu être édité.', true), 'message_erreur');
            }
        }

        if (empty($this->request->data)) {
            $this->request->data = $this->Level->read(null, $id);

            if (empty($this->request->data)) {
                $this->Session->setFlash(__('Le niveau que vous souhaitez éditer n\'existe pas.', true), 'message_erreur');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    /**
     * Méthode permettant de supprimer un niveau.
     *
     * @param int $id L'identifiant du niveau à supprimer
     *
     * @return void 
     * @access public
     */
    public function delete ($id)
    {        
        if (!$id) {
            $this->redirect(array('action'=>'index'));
        }

        if ($this->Level->delete($id)) {
            $this->Session->setFlash(__('Le niveau a été supprimée.', true), 'message_succes');
            $this->redirect(array('action'=>'index'));
        }

        $this->Session->setFlash(__('Le niveau que vous souhaitez supprimer n\'existe pas.', true), 'message_erreur');
        $this->redirect(array('action' => 'index'));
    }
    
}
?>
