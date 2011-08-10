<?php

/**
  * periods_controller.php
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
    /**
    * Méthode permettant de visionner l'ensemble des périodes scolaires.
    * 
    * @return void
    * @access public
    */
    function index()
    {
        $this->set('title_for_layout', __('Trimestres', true));
        $this->set('pupils', $this->paginate());
    }
    
    /**
    * Méthode permettant d'ajouter une période scolaire.
    * 
    * @return void
    * @access public
    */
    function add()
    {
        $this->set('title_for_layout', __('Ajouter un trimestre', true));
    }

    /**
    * Méthode permettant d'éditer une période scolaire.
    *
    * @param int $id Identifiant de la période scolaire à éditer.
    * 
    * @return void
    * @access public
    */
    function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier une trimestre', true));
    }

    /**
    * Méthode permettant de supprimer une période scolaire.
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
