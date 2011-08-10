<?php

/**
  * pupils_controller.php
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
 * Contrôleur de gestion des élèves.
 *
 * @category Controller
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class PupilsController extends AppController
{
    
    /**
     * Méthode listant l'ensemble des élèves existants.
     *
     * @return void
     * @access public
     */
    function index()
    {
        $this->Pupil->recursive = 0;
        $this->set('title_for_layout', __('Liste des élèves', true));
        $this->set('pupils', $this->paginate());
    }

    /**
     * Méthode affichant les détails d'un élève et les élèves de cette classe.
     *
     * @param int $id L'identifiant de l'élève à visionner.
     * 
     * @return void
     * @access public
     */
    function view($id = null)
    {
        //On transmet le titre à la vue.
        $this->set('title_for_layout', __('Affichage d\'un élève', true));

        //Si l'id de l'élève à afficher n'a pas été passé en paramètre,
        //on redirige l'utilisateur sur la liste des élèves.
        if (!$id) {
            $this->redirect(array('action' => 'index'));
        }

        //On essayes de récupérer dans $infoPupil les informations de la
        //classe pour laquelle l'id a été passé en paramètre.
        //Si l'élève n'existe pas (mauvais id), alors, la variable sera vide.
        $infoPupil = $this->Pupil->read(null, $id);

        //Avant d'afficher la page, on teste si $infoPupil est vide, si c'est
        //le cas, on cours-circuite l'affichage en redirigeant l'utilisateur vers
        //la liste des classe en affichant un message d'erreur.
        if (!empty($infoPupil)) {
            $this->set('pupil', $infoPupil);
        } else {
            $this->Session->setFlash(__('L\'élève que vous souhaitez afficher n\'existe pas.', true), 'message_erreur');
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * Méthode permettant d'ajouter un élève.
     *
     * @return void
     * @access public
     */
    function add()
    {
        $this->set('title_for_layout', __('Création d\'un élève', true));
        
        //Les données du formulaires ont été envoyées, on vérifie les règles
        //de validation et, si elles sont satisfaites, on enregistre en BDD.
        if (!empty($this->data)) {
            $this->Pupil->create();
            if ($this->Pupil->save($this->data)) {
                $this->Session->setFlash(__('L\'élève a été ajoutée.', true), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'élève n\'a pas pu être ajoutée.', true), 'message_erreur');
            }
        }
    }

    /**
     * Méthode permettant d'éditer un élève existante.
     *
     * @param int $id L'identifiant de l'élève à éditer.
     * 
     * @return void
     * @access public
     */
    function edit($id = null)
    {
        //Aucun id n'a été fourni, on redirige vers la liste des élèves
        if (!$id && empty($this->data)) {
            $this->redirect(array('action' => 'index'));
        }

        //Les données du formulaires ont été envoyées, on vérifie les règles
        //de validation et, si elles sont satisfaites, on enregistre en BDD.
        if (!empty($this->data)) {
            if ($this->Pupil->save($this->data)) { 
                $this->Session->setFlash(__('L\'élève a été sauvegardé.', true), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'élève n\'a pas pu être éditée.', true), 'message_erreur');
            }
        }

        //Le formulaire n'a pas été posté, on tente de le remplir avec les
        //infos de l'élève dont l'id a été passé en paramètre.
        //Si on y parvient pas, on affiche un message d'erreur et on redirige
        //vers la liste des élèves.
        if (empty($this->data)) {
            $this->data = $this->Pupil->read(null, $id);

            if (empty($this->data)) {
                $this->Session->setFlash(__('L\'élève que vous souhaitez éditer n\'existe pas.', true), 'message_erreur');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
     * Méthode permettant de supprimer un élève existant.
     *
     * @param int $id L'identifiant de l'élève à supprimer.
     * 
     * @return void
     * @access public
     */
    function delete($id = null)
    {
        //Si aucun id n'a été fourni en paramètre, on redirige vers
        //la liste des élèves.
        if (!$id) {
            $this->redirect(array('action'=>'index'));
        }

        //On supprime l'élève souhaitée et on redirige vers la liste des élèves.
        if ($this->Pupil->delete($id)) {
            $this->Session->setFlash(__('L\'élève a été supprimée.', true), 'message_succes');
            $this->redirect(array('action'=>'index'));
        }

        //Un mauvais id a été passé en paramètre, on indique que l'élève à supprimer
        //n'existe pas et on redirige vers la liste des élèves.
        $this->Session->setFlash(__('L\'élève que vous souhaitez supprimer n\'existe pas.', true), 'message_erreur');
        $this->redirect(array('action' => 'index'));
    }
}

?>
