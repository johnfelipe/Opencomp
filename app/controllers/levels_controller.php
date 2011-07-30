<?php

class LevelsController extends AppController
{
    
    function index()
    {
	$this->Level->recursive = 0;
	$this->set('title_for_layout', __('Niveaux', true));
	$this->set('levels', $this->paginate());
    }
    //Ajout d'un niveau
    function add($id = null)
    {
	$this->set('title_for_layout', __('Ajouter un niveau', true));

	if (!empty($this->data))
	{
		$this->Level->create();
		if ($this->Level->save($this->data))
		{
			$this->Session->setFlash(__('Le niveau a été ajouté.', true), 'message_succes');
			$this->redirect(array('action' => 'index'));
		}
		else
		{
			$this->Session->setFlash(__('Le niveau n\'a pas pu être ajouté.', true), 'message_erreur');
		}
	}
    }
    
      function edit($id = null)
    {
	if (!$id && empty($this->data))
	{
		$this->redirect(array('action' => 'index'));
	}

	if (!empty($this->data))
	{
	    if ($this->Level->save($this->data))
	    {
		$this->Session->setFlash(__('Le niveau a été sauvegardé.', true), 'message_succes');
		$this->redirect(array('action' => 'index'));
	    }
	    else
	    {
		    $this->Session->setFlash(__('Le niveau n\'a pas pu être éditée.', true), 'message_erreur');
	    }
	}

	if (empty($this->data))
	{
	    $this->data = $this->Level->read(null, $id);

	    if(empty($this->data))
	    {
		$this->Session->setFlash(__('Le niveau que vous souhaitez éditer n\'existe pas.', true), 'message_erreur');
		$this->redirect(array('action' => 'index'));
	    }
	}
    }
    
    
    function delete ($id)
    {        
	if (!$id)
	{
		$this->redirect(array('action'=>'index'));
	}

	if ($this->Level->delete($id))
	{
		$this->Session->setFlash(__('Le niveau a été supprimée.', true),'message_succes');
		$this->redirect(array('action'=>'index'));
	}

	$this->Session->setFlash(__('Le niveau que vous souhaitez supprimer n\'existe pas.', true),'message_erreur');
	$this->redirect(array('action' => 'index'));
    }
    
}
?>
