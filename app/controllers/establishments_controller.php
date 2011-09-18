<?php

/**
  * establishments_controller.php
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
 * Contrôleur de gestion des établissements scolaires.
 *
 * @category Controller
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class EstablishmentsController extends AppController
{
    /**
    * Méthode permettant de visionner l'ensemble des établissements scolaires.
    *
    * @return void
    * @access public
    */
    function index()
    {
        $this->set('title_for_layout', __('Liste des établissements', true));
        $this->set('establishments', $this->paginate());
    }

    /**
    * Méthode permettant d'ajouter un établissement scolaire.
    *
    * @return void
    * @access public
    */
    function add()
    {
        $this->set('title_for_layout', __('Ajouter un établissement', true));

        //On transmet à la vue la liste des utilisateurs.
        $u = $this->Establishment->User->find('list');
        $this->set('utilisateurs', $u);
        $a = $this->Establishment->Academy->find('list');
        $this->set('academies', $a);

        if (!empty($this->data)) {
            $this->Establishment->create();
            if ($this->Establishment->save($this->data)) {
                $this->Session->setFlash(__('L\'établissement a été ajouté.', true), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'établissement n\'a pas pu être ajouté.', true), 'message_erreur');
            }
        }
    }

    /**
    * Méthode permettant d'éditer un établissement scolaire.
    *
    * @param int $id Identifiant de l'établissement scolaire à éditer.
    *
    * @return void
    * @access public
    */
    function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier un établissement', true));

        //On transmet à la vue la liste des utilisateurs.
        $u = $this->Establishment->User->find('list');
        $this->set('utilisateurs', $u);
        $a = $this->Establishment->Academy->find('list');
        $this->set('academies', $a);

        if (!$id && empty($this->data)) {
            $this->redirect(array('action' => 'index'));
        }

        if (!empty($this->data)) {
            if ($this->Establishment->save($this->data)) {
                $this->Session->setFlash(__('L\'établissement a été sauvegardé.', true), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'établissement n\'a pas pu être édité.', true), 'message_erreur');
            }
        }

        if (empty($this->data)) {
            $this->data = $this->Establishment->read(null, $id);

            if (empty($this->data)) {
                $this->Session->setFlash(__('L\'établissement que vous souhaitez éditer n\'existe pas.', true), 'message_erreur');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
    * Méthode permettant de supprimer un établissement scolaire.
    *
    * @param int $id Identifiant de l'établissement scolaire à supprimer.
    *
    * @return void
    * @access public
    */
    function delete ($id)
    {
        if (!$id) {
            $this->redirect(array('action'=>'index'));
        }

        if ($this->Establishment->delete($id)) {
            $this->Session->setFlash(__('L\'établissement a été supprimé.', true), 'message_succes');
            $this->redirect(array('action'=>'index'));
        }

        $this->Session->setFlash(__('L\'établissement que vous souhaitez supprimer n\'existe pas.', true), 'message_erreur');
        $this->redirect(array('action' => 'index'));
    }

}
    ?>
