<?php

/**
 * Contrôleur de gestion des académies
 *
 * @category	Controller
 * @package 	Opencomp
 * @version 	1.0
 * @author	Jean Traullé <jtraulle@gmail.com>
 * @author	Gauthier Dulot <mrimgauthier@gmail.com>
 * @license  	http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     	http://www.opencomp.fr
 */

class AcademiesController extends AppController
{
    
    /**
     * Méthode listant l'ensemble des académies existantes.
     *
     * @return void
     * @access public
     */
    function index()
    {
        $this->set('title_for_layout', __('Liste des Academies',true));
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
        $this->set('title_for_layout', __('Ajouter une Academie',true));
        
    }
    
    /**
     * Méthode permettant d'éditer une académie.
     *
     * @return void
     * @param int $id
     * @access public
     */
    function edit($id = null)
    {
        $this->set('title_for_layout', __('Modifier une Academie',true));   
    }
    
    /**
     * Méthode permettant de supprimer une académie.
     *
     * @return void
     * @param int $id
     * @access public
     */
    function delete ($id)
    {
        
    }
    
    /**
     * Méthode permettant de visualiser les détails d'une académie.
     *
     * @return void
     * @param int $id
     * @access public
     */
    function view($id)
    {
	$this->set('title_for_layout', __('Affichage d\'une académie', true));
	
	if (!$id)
	{
	    $this->redirect(array('action' => 'index'));
	}

	$infoAcademy = $this->Academy->read(null, $id);

	if (!empty($infoAcademy))
		$this->set('academy', $infoAcademy);
	else
	{
		$this->Session->setFlash(__('L\'académie que vous souhaitez afficher n\'existe pas.', true), 'message_erreur');
		$this->redirect(array('action' => 'index'));
	}
    }
}
?>
