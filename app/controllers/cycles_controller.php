<?php

/**
  * cycles_controller.php
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
    function index()
    {
        $this->set('title_for_layout', __('Liste des cycles', true));
        $this->set('cycles', $this->paginate());
    }
    
    /**
    * Méthode permettant d'ajouter un cycle.
    * 
    * @return void
    * @access public
    */
    function add()
    {
        $this->set('title_for_layout', __('Ajouter un cycle', true));
    }
    
    /**
    * Méthode permettant d'éditer un cycle.
    *
    * @param int $id Identifiant du cycle à éditer.
    * 
    * @return void
    * @access public
    */
    function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier un cycle', true));
    }

    /**
    * Méthode permettant de supprimer un cycle.
    *
    * @param int $id Identifiant du cycle à supprimer.
    * 
    * @return void
    * @access public
    */
    function delete($id)
    {
        
    }    
}
?>
