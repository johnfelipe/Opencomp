<?php

/**
  * years_controller.php
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
 * Contrôleur de gestion des années scolaires.
 *
 * @category Controller
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class YearsController extends AppController
{
    /**
     * Méthode listant l'ensemble des années scolaires existantes.
     *
     * @return void
     * @access public
     */
    function index()
    {
        $this->set('title_for_layout', __('Liste des années scolaires', true));
        $this->set('years', $this->paginate());
    }

    /**
     * Méthode permettant d'ajouter une année scolaire.
     *
     * @return void
     * @access public
     */
    function add()
    {
        $this->set('title_for_layout', __('Création d\'une année scolaire', true));

        //Les données du formulaires ont été envoyées, on vérifie les règles
        //de validation et, si elles sont satisfaites, on enregistre en BDD.
        if (!empty($this->data)) {
            $this->Year->create();
            if ($this->Year->save($this->data)) {
                $this->Session->setFlash(__('L\'année scolaire a été ajoutée.', true), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'année scolaire n\'a pas pu être ajoutée.', true), 'message_erreur');
            }
        }
    }

    /**
     * Méthode permettant d'éditer un année scolaire existante.
     *
     * @param int $id L'identifiant de l'année scolaire à éditer.
     *
     * @return void
     * @access public
     */
    function edit($id = null)
    {
        $this->set('title_for_layout', __('Édition d\'une année scolaire', true));

        //Aucun id n'a été fourni, on redirige vers la liste des années scolaires.
        if (!$id && empty($this->data)) {
            $this->redirect(array('action' => 'index'));
        }

        //Les données du formulaires ont été envoyées, on vérifie les règles
        //de validation et, si elles sont satisfaites, on enregistre en BDD.
        if (!empty($this->data)) {
            if ($this->Year->save($this->data)) {
                $this->Session->setFlash(__('L\'année scolaire a été sauvegardé.', true), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'année scolaire n\'a pas pu être éditée.', true), 'message_erreur');
            }
        }

        //Le formulaire n'a pas été posté, on tente de le remplir avec les
        //infos de l'année scolaire dont l'id a été passé en paramètre.
        //Si on y parvient pas, on affiche un message d'erreur et on redirige
        //vers la liste des années scolaires.
        if (empty($this->data)) {
            $this->data = $this->Year->read(null, $id);

            if (empty($this->data)) {
                $this->Session->setFlash(__('L\'année scolaire que vous souhaitez éditer n\'existe pas.', true), 'message_erreur');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
     * Méthode permettant de supprimer une année scolaire existant.
     *
     * @param int $id L'identifiant de l'année scolaire à supprimer.
     *
     * @return void
     * @access public
     */
    function delete($id = null)
    {
        //Si aucun id n'a été fourni en paramètre, on redirige vers
        //la liste des années scolaires.
        if (!$id) {
            $this->redirect(array('action'=>'index'));
        }

        //On supprime l'élève souhaitée et on redirige vers la liste des années scolaires.
        if ($this->Year->delete($id)) {
            $this->Session->setFlash(__('L\'année scolaire a été supprimée.', true), 'message_succes');
            $this->redirect(array('action'=>'index'));
        }

        //Un mauvais id a été passé en paramètre, on indique que l'année scolaire à supprimer
        //n'existe pas et on redirige vers la liste des années scolaires.
        $this->Session->setFlash(__('L\'élève que vous souhaitez supprimer n\'existe pas.', true), 'message_erreur');
        $this->redirect(array('action' => 'index'));
    }
}

?>

