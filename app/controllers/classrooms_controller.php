<?php

/**
  * classroom_controller.php
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
 * Contrôleur de gestion des classes.
 *
 * @category Controller
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class ClassroomsController extends AppController
{

    /**
     * Méthode listant l'ensemble des classes existantes.
     *
     * @return void
     * @access public
     */
    function index()
    {
        $this->Classroom->recursive = 0;
        $this->set('title_for_layout', __('Liste des classes', true));
        $this->set('classrooms', $this->paginate());
    }

    /**
     * Méthode affichant les détails d'une classe et les élèves de cette classe.
     *
     * @param int $id L'identifiant de la classe à visionner.
     * 
     * @return void
     * @access public
     */
    function view($id = null)
    {
        //On transmet le titre à la vue.
        $this->set('title_for_layout', __('Affichage d\'une classe', true));

        //Si l'id de la classe à afficher n'a pas été passé en paramètre,
        //on redirige l'utilisateur sur la liste des classes.
        if (!$id) {
            $this->redirect(array('action' => 'index'));
        }

        //On essayes de récupérer dans $infoClasse les informations de la
        //classe pour laquelle l'id a été passé en paramètre.
        //Si la classe n'existe pas (mauvais id), alors, la variable sera vide.
        $infoClasse = $this->Classroom->read(null, $id);

        //Avant d'afficher la page, on teste si $infoClasse est vide, si c'est
        //le cas, on cours-circuite l'affichage en redirigeant l'utilisateur vers
        //la liste des classe en affichant un message d'erreur.
        if (!empty($infoClasse)) {
            $this->set('classroom', $infoClasse);
        } else {
            $this->Session->setFlash(__('La classe que vous souhaitez afficher n\'existe pas.', true), 'message_erreur');
            $this->redirect(array('action' => 'index'));
        }

    }

    /**
     * Méthode permettant d'ajouter une classe.
     *
     * @return void
     * @access public
     */
    function add()
    {
        //Les données du formulaires ont été envoyées, on vérifie les règles
        //de validation et, si elles sont satisfaites, on enregistre en BDD.
        if (!empty($this->data)) {
            $this->Classroom->create();
            if ($this->Classroom->save($this->data)) {
                $this->Session->setFlash(__('La classe a été ajoutée.', true), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La classe n\'a pas pu être ajoutée.', true), 'message_erreur');
            }
        }
    }

    /**
     * Méthode permettant d'éditer une classe existante.
     *
     * @param int $id L'identifiant de la classe à éditer.
     * 
     * @return void
     * @access public
     */
    function edit($id = null)
    {
        //Aucun id n'a été fourni, on redirige vers la liste des classes
        if (!$id && empty($this->data)) {
            $this->redirect(array('action' => 'index'));
        }

        //Les données du formulaires ont été envoyées, on vérifie les règles
        //de validation et, si elles sont satisfaites, on enregistre en BDD.
        if (!empty($this->data)) {
            if ($this->Classroom->save($this->data)) {
                $this->Session->setFlash(__('La classe a été sauvegardé.', true), 'message_succes');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La classe n\'a pas pu être éditée.', true), 'message_erreur');
            }
        }

        //Le formulaire n'a pas été posté, on tente de le remplir avec les
        //infos de la classe dont l'id a été passé en paramètre.
        //Si on y parvient pas, on affiche un message d'erreur et on redirige
        //vers la liste des classes.
        if (empty($this->data)) {
            $this->data = $this->Classroom->read(null, $id);

            if (empty($this->data)) {
                $this->Session->setFlash(__('La classe que vous souhaitez éditer n\'existe pas.', true), 'message_erreur');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
     * Méthode permettant de supprimer une classe existante.
     *
     * @param int $id L'identifiant de la classe à supprimer.
     * 
     * @return void
     * @access public
     */
    function delete($id = null)
    {
        //Si aucun id n'a été fourni en paramètre, on redirige vers
        //la liste des classes.
        if (!$id) {
            $this->redirect(array('action'=>'index'));
        }

        //On supprime la classe souhaitée et on redirige vers la liste des classes.
        if ($this->Classroom->delete($id)) {
            $this->Session->setFlash(__('La classe a été supprimée.', true), 'message_succes');
            $this->redirect(array('action'=>'index'));
        }

        //Un mauvais id a été passé en paramètre, on indique que la classe à supprimer
        //n'existe pas et on redirige vers la liste des classes.
        $this->Session->setFlash(__('La classe que vous souhaitez supprimer n\'existe pas.', true), 'message_erreur');
        $this->redirect(array('action' => 'index'));
    }
}

?>
