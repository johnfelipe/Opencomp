<?php

/**
  * academies_controller.php
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
 * Contrôleur de gestion des académies
 *
 * @category Controller
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @author   Gauthier Dulot <mrimgauthier@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class AcademiesController extends AppController
{

    var $paginate = array(
        'Academy' => array(
            'limit' => 20,
            'order' => array(
                'Academy.name' => 'Asc'
            )
        )
    );

    /**
     * Méthode listant l'ensemble des académies existantes.
     *
     * @return void
     * @access public
     */
    function index()
    {
        $this->set('title_for_layout', __('Liste des académies', true));
        $this->set('academies', $this->paginate());
    }

    /**
     * Méthode permettant d'ajouter une académie.
     *
     * @return void
     * @access public
     */
    function add()
    {
        $this->set('title_for_layout', __('Ajouter une académie', true));

        //On transmet à la vue la liste des utilisateurs.
        $this->set('users', $this->Academy->User->find('list'));

        if (!empty($this->data)) {
            $this->Academy->create();
            if ($this->Academy->save($this->data)) {
                $this->Session->setFlash(__('L\'académie a été ajoutée.', true), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'académie n\'a pas pu être ajoutée.', true), 'message_erreur');
            }
        }
    }

    /**
     * Méthode permettant d'éditer une académie.
     *
     * @param int $id L'identifiant de l'académie à éditer.
     *
     * @return void
     * @access public
     */
    function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier une académie', true));

        //On transmet à la vue la liste des utilisateurs.
        $this->set('users', $this->Academy->User->find('list'));

        if (!$id && empty($this->data)) {
            $this->redirect(array('action' => 'index'));
        }

        if (!empty($this->data)) {
            if ($this->Academy->save($this->data)) {
                $this->Session->setFlash(__('L\'académie a été sauvegardé.', true), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'académie n\'a pas pu être éditée.', true), 'message_erreur');
            }
        }

        if (empty($this->data)) {
            $this->data = $this->Academy->read(null, $id);

            if (empty($this->data)) {
                $this->Session->setFlash(__('L\'académie que vous souhaitez éditer n\'existe pas.', true), 'message_erreur');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
     * Méthode permettant de supprimer une académie.
     *
     * @param int $id L'identifiant de l'académie à supprimer
     *
     * @return void
     * @access public
     */
    function delete($id)
    {
        if (!$id) {
            $this->redirect(array('action'=>'index'));
        }

        if ($this->Academy->delete($id)) {
            $this->Session->setFlash(__('L\'académie a été supprimée.', true), 'message_succes');
            $this->redirect(array('action'=>'index'));
        }

        $this->Session->setFlash(__('L\'académie que vous souhaitez supprimer n\'existe pas.', true), 'message_erreur');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Méthode permettant de visualiser les détails d'une académie.
     *
     * @param int $id L'identifiant de l'académie à visionner
     *
     * @return void
     * @access public
     */
    function view($id)
    {
        $this->set('title_for_layout', __('Affichage d\'une académie', true));

        if (!$id) {
            $this->redirect(array('action' => 'index'));
        }

        $infoAcademy = $this->Academy->read(null, $id);

        if (!empty($infoAcademy)) {
            $this->set('academy', $infoAcademy);
        } else {
            $this->Session->setFlash(__('L\'académie que vous souhaitez afficher n\'existe pas.', true), 'message_erreur');
            $this->redirect(array('action' => 'index'));
        }
    }

}
?>
