<?php

/**
 * Contrôleur de gestion des élèves
 *
 * @category	Controller
 * @package 	Opencomp
 * @version 	1.0
 * @author		Jean Traullé <jtraulle@gmail.com>
 * @license  	http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     	http://www.opencomp.fr
 */
class PupilsController extends AppController {

	var $name = 'Pupils';

	function index()
    {
		$this->Pupil->recursive = 0;
        $this->set('title_for_layout', __('Liste des élèves',true));
        $this->set('pupils', $this->paginate());
	}

	function view($id = null)
    {
    	$this->set('title_for_layout', __('Consultation d\'un élève',true));
        if (!$id)
        {
        	$this->Session->setFlash(__('L\'élève n\'existe pas', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('pupil', $this->Pupil->read(null, $id));
	}

	function add()
    {
    	$this->set('title_for_layout', __('Ajouter un élève',true));
		if (!empty($this->data))
        {
			$this->Pupil->create();
			if ($this->Pupil->save($this->data))
            {
            	$this->Session->setFlash(__('L\'élève a été ajouté',true), 'message_succes');
                $this->redirect(array('action' => 'index'));
			}
            else
            {
            	$this->Session->setFlash(__('L\'élève n\'a pas été ajouté en raison d\'une erreur interne',true), 'message_erreur');
			}
		}
		$classrooms = $this->Pupil->Classroom->find('list');
		$this->set(compact('classrooms'));
	}

	function edit($id = null)
    {
    	$this->set('title_for_layout', __('Editer un élève',true));
		if (!$id && empty($this->data))
        {
        	$this->Session->setFlash(__('L\'élève que vous souhaitez éditer n\'existe pas',true), 'message_erreur');
			$this->redirect(array('action' => 'index'));
		}

		if (!empty($this->data))
    	{
    		if ($this->Pupil->save($this->data))
            {
            	$this->Session->setFlash(__('Vos modifications ont été sauvegardées',true), 'message_succes');
				$this->redirect(array('action' => 'index'));
            }
            else
            {
            	$this->Session->setFlash(__('Vos modifications n\'ont pas été sauvegardées en raison d\'une erreur interne',true), 'message_erreur');
            }
		}

        if (empty($this->data))
        {
        	$this->data = $this->Pupil->read(null, $id);
		}

        $classrooms = $this->Pupil->Classroom->find('list');
		$this->set(compact('classrooms'));
	}

	function delete($id = null)
    {
    	$this->set('title_for_layout', __('Supprimer un élève',true));
		if (!$id)
        {
			$this->Session->setFlash(__('L\'élève que vous souhaitez supprimer n\'existe pas',true), 'message_erreur');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Pupil->delete($id))
        {
			$this->Session->setFlash(__('L\'élève a été correctement supprimé',true), 'message_succes');
			$this->redirect(array('action'=>'index'));
		}

        $this->Session->setFlash(__('L\'élève n\'a pas pu être supprimé en raison d\'une erreur interne',true), 'message_erreur');
		$this->redirect(array('action' => 'index'));
	}
}

?>