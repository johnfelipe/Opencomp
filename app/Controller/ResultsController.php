
<?php

/**
  * ResultsController.php
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
 * Contrôleur de gestion des résultats.
 *
 * @category Controller
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class ResultsController extends AppController
{
    /**
    * Méthode permettant de visionner l'ensemble des résulatats.
    * 
    * @return void
    * @access public
    */
    public function index()
    {
        $this->set('title_for_layout', __('Les Résultats', true));
        $this->set('results', $this->paginate());
    }
    
    /**
    * Méthode permettant de saisir les résultats d'une évaluation.
    * 
    * @return void
    * @access public
    */
    public function add()
    {
        $this->set('title_for_layout', __('Ajouter un résultat', true));
    }
    
    /**
    * Méthode permettant d'éditer les résultats d'une évaluation.
    *
    * @param int $id Identifiant du résultat à éditer.
    * 
    * @return void
    * @access public
    */
    public function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier un résultat', true));
    }
    
    
    /**
    * Méthode permettant de supprimer les résultats d'une évaluation.
    *
    * @param int $id Identifiant du résultat à supprimer.
    * 
    * @return void
    * @access public
    */
    public function delete($id)
    {
        
    }
    
}
?>
