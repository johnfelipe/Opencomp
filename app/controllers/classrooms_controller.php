<?php

/**
 * Contrôleur de gestion des classes
 *
 * @category	Controller
 * @package 	Opencomp
 * @version 	1.0
 * @author		Jean Traullé <jtraulle@gmail.com>
 * @license  	http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     	http://www.opencomp.fr
 */
class ClassroomsController extends AppController {

	var $name = 'Classrooms';

	function index()
	{
		$this->Classroom->recursive = 0;
        $this->set('title_for_layout', __('Liste des classes', true));
		$this->set('classrooms', $this->paginate());
	}

	function view($id = null)
	{
    	$this->set('title_for_layout', __('Affichage d\'une classe', true));
		if (!$id)
		{
			$this->Session->setFlash(__('La classe n\'existe pas.', true), 'message_erreur');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('classroom', $this->Classroom->read(null, $id));
	}

	function add()
	{
		if (!empty($this->data))
		{
			$this->Classroom->create();
			if ($this->Classroom->save($this->data))
			{
				$this->Session->setFlash(__('La classe a été supprimée.', true), 'message_succes');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('La classe n\'a pas pu être supprimée.', true), 'message_erreur');
			}
		}
	}

	function edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(__('La classe n\'existe pas.', true), 'message_erreur');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data))
		{
			if ($this->Classroom->save($this->data))
			{
				$this->Session->setFlash(__('La classe a été sauvegardé.', true), 'message_succes');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('La classe n\'a pas pu être supprimée.', true), 'message_erreur');
			}
		}
		if (empty($this->data))
		{
			$this->data = $this->Classroom->read(null, $id);
		}
	}

	function delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(__('La classe que vous souhaitez supprimer n\'existe pas.', true), 'message_erreur');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Classroom->delete($id))
		{
			$this->Session->setFlash(__('La classe a été supprimé', true),'message_succes');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('La classe n\'a pas pu être supprimée.', true),'message_erreur');
		$this->redirect(array('action' => 'index'));
	}
}

?>