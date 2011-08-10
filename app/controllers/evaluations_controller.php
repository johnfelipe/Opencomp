<?php

/**
  * evaluations_controller.php
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
 * Contrôleur de gestion des évaluations.
 *
 * @category Controller
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class EvaluationsController extends AppController
{
    /**
    * Méthode permettant de visionner l'ensemble des évaluations.
    * 
    * @return void
    * @access public
    */
    function index()
    {
        $this->set('title_for_layout', __('Les Evaluations', true));
        $this->set('evaluations', $this->paginate());
    }
    
    /**
    * Méthode permettant d'ajouter une évaluation.
    * 
    * @return void
    * @access public
    */
    function add()
    {
        $this->set('title_for_layout', __('Ajouter une évaluation', true));
    }
    
    /**
    * Méthode permettant d'éditer une évaluation.
    *
    * @param int $id Identifiant de l'évaluation à éditer.
    * 
    * @return void
    * @access public
    */
    function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier une évaluation', true));
    }
    
    
    /**
    * Méthode permettant de supprimer une évaluation.
    *
    * @param int $id Identifiant de l'évaluation à supprimer.
    * 
    * @return void
    * @access public
    */
    function delete ($id)
    {
        
    }

}
?>
