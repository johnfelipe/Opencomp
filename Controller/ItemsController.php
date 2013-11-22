<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 */
class ItemsController extends AppController {

	public function editTitle($id = null){	
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('The item_id provided does not exist !'));
		}
		
		//On vérifie qu'un paramètre nommé evaluation_id a été fourni et qu'il existe.
		if(isset($this->request->data['Item']['evaluation_id'])) {
       		$evaluation_id = intval($this->request->data['Item']['evaluation_id']);
       		$this->set('evaluation_id', $evaluation_id);
       		
       		$this->loadModel('Evaluation');
       		$this->Evaluation->id = $evaluation_id;
			if (!$this->Evaluation->exists()) {
				throw new NotFoundException(__('The evaluation_id provided does not exist !'));
			}
		} else {
			throw new NotFoundException(__('You must provide a evaluation_id in order to edit an item !'));
		}
						
		if ($this->request->is('post')) {	
		
			$this->Item->recursive = false;
			$item = $this->Item->read(null, $id);

			if($this->Auth->user('id') != $item['Item']['user_id'] && $this->Auth->user('role') != 'admin'){
				$this->Session->setFlash(__('Vous ne pouvez pas éditer un item dont vous n\'êtes pas propriétaire.'), 'flash_error');
				$this->redirect(array(
				    'controller'    => 'evaluations',
				    'action'        => 'attacheditems', $evaluation_id));
			}else{
				$this->Item->set('title', h($this->request->data['Item']['title']));					
				$this->Item->save(null, false);	
				
				$this->Session->setFlash(__('Le libellé de l\'item a été correctement mis à jour.'), 'flash_success');
				$this->redirect(array(
				    'controller'    => 'evaluations',
				    'action'        => 'attacheditems', $evaluation_id));

			}		
		}
		
	}
}
