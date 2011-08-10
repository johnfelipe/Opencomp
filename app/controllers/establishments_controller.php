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
        $this->set('title_for_layout', __('Liste des Etablissements', true));
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
        
    }
    
}
    ?>
