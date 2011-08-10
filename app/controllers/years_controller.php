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
    * Méthode permettant de visionner l'ensemble des années scolaires.
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
    * Méthode permettant de supprimer une année scolaire.
    *
    * @param int $id Identifiant de l'année scolaire à supprimer.
    * 
    * @return void
    * @access public
    */
    function delete ($id)
    {
        
    }
    
}
?>
