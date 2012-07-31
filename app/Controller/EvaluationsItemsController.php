<?php
App::uses('AppController', 'Controller');
/**
 * EvaluationsItems Controller
 *
 * @property EvaluationsItem $EvaluationsItem
 */
class EvaluationsItemsController extends AppController {

	public function attachitem(){
		//On vérifie qu'un paramètre nommé evaluation_id a été fourni et qu'il existe.
		if(isset($this->request->params['named']['evaluation_id'])) {
       		$evaluation_id = intval($this->request->params['named']['evaluation_id']);
       		$this->set('evaluation_id', $evaluation_id);
       		$this->EvaluationsItem->Evaluation->id = $evaluation_id;
			if (!$this->EvaluationsItem->Evaluation->exists()) {
				throw new NotFoundException(__('The evaluation_id provided does not exist !'));
			}
		} else {
			throw new NotFoundException(__('You must provide a evaluation_id in order to attach an item to this test !'));
		}
		
		//On vérifie qu'un paramètre nommé item_id a été fourni et qu'il existe.
		if(isset($this->request->params['named']['item_id'])) {
       		$item_id = intval($this->request->params['named']['item_id']);
       		$this->set('item_id', $item_id);
       		$this->EvaluationsItem->Item->id = $item_id;
			if (!$this->EvaluationsItem->Item->exists()) {
				throw new NotFoundException(__('The item_id provided does not exist !'));
			}
		} else {
			throw new NotFoundException(__('You must provide an item_id in order to attach an item to this test !'));
		}
		
		$alreadyExist = $this->EvaluationsItem->find('first', array(
	        'conditions' => array('EvaluationsItem.evaluation_id' => $evaluation_id, 'EvaluationsItem.item_id' => $item_id)
	    ));
	    
	    if($alreadyExist){
		    $this->Session->setFlash(__('Impossible d\'ajouter cet item à cette évaluation, il y est déjà associé.'), 'flash_error');
			$this->redirect(array(
			    'controller'    => 'competences',
			    'action'        => 'attachitem', 
			    'evaluation_id' => $evaluation_id));
	    }else{
		    $data = array(
				'EvaluationsItem' => array(
					'evaluation_id' => $evaluation_id,
					'item_id' => $item_id
				)
			);
			
			$this->EvaluationsItem->create();
			$this->EvaluationsItem->save($data);
			
			$this->Session->setFlash(__('L\'item sélectionné a été correctement associé à l\'évaluation.'), 'flash_success');
			$this->redirect(array(
			    'controller'    => 'evaluations',
			    'action'        => 'attacheditems', $evaluation_id));
	    }			
	}
	
	public function additem(){
	
		$this->set('title_for_layout', __('Ajouter un item'));
		
		//On vérifie qu'un paramètre nommé evaluation_id a été fourni et qu'il existe.
		if(isset($this->request->params['named']['evaluation_id'])) {
       		$evaluation_id = intval($this->request->params['named']['evaluation_id']);
       		$this->set('evaluation_id', $evaluation_id);
       		$this->EvaluationsItem->Evaluation->id = $evaluation_id;
			if (!$this->EvaluationsItem->Evaluation->exists()) {
				throw new NotFoundException(__('The evaluation_id provided does not exist !'));
			}
		} else {
			throw new NotFoundException(__('You must provide a evaluation_id in order to attach an item to this test !'));
		}
		
		//On vérifie qu'un paramètre nommé competence_id a été fourni et qu'il existe.
		if(isset($this->request->params['named']['competence_id'])) {
       		$competence_id = intval($this->request->params['named']['competence_id']);
       		$this->set('competence_id', $competence_id);
       		$this->EvaluationsItem->Item->Competence->id = $competence_id;
			if (!$this->EvaluationsItem->Item->Competence->exists()) {
				throw new NotFoundException(__('The competence_id provided does not exist !'));
			}
		} else {
			throw new NotFoundException(__('You must provide a competence_id in order to create a new item for this test !'));
		}
		
		$eval = $this->EvaluationsItem->Evaluation->find('first', array(
	        'conditions' => array('id' => $evaluation_id),
	        'recursive' => -1
	    ));
	    $this->set('eval', $eval);
		
		$path = $this->EvaluationsItem->Item->Competence->getPath($competence_id);
		$mypath = '';
		foreach($path as $competence){
			$mypath .= $competence['Competence']['title'].' <i class="icon-chevron-right"></i> ';
		}
		$mypath = substr($mypath, 0, -36);
		$this->set('path', $mypath);
		
		if ($this->request->is('post')) {
			$this->EvaluationsItem->Item->create();
			if ($this->EvaluationsItem->Item->save($this->request->data)) {
				$data = array(
					'EvaluationsItem' => array(
						'evaluation_id' => $evaluation_id,
						'item_id' => $this->EvaluationsItem->Item->id
					)
				);
				
				$this->EvaluationsItem->create();
				$this->EvaluationsItem->save($data);
				
				$this->Session->setFlash(__('L\'item a été correctement créé et associé à l\'évaluation.'), 'flash_success');
				$this->redirect(array(
				    'controller'    => 'evaluations',
				    'action'        => 'attacheditems', $evaluation_id));
			} else {
				$this->Session->setFlash(__('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.'), 'flash_error');
			}
		}
		
	}
	
	public function unlinkitem(){
		//On vérifie qu'un paramètre nommé evaluation_id a été fourni et qu'il existe.
		if(isset($this->request->params['named']['evaluation_id'])) {
       		$evaluation_id = intval($this->request->params['named']['evaluation_id']);
       		$this->set('evaluation_id', $evaluation_id);
       		$this->EvaluationsItem->Evaluation->id = $evaluation_id;
			if (!$this->EvaluationsItem->Evaluation->exists()) {
				throw new NotFoundException(__('The evaluation_id provided does not exist !'));
			}
		} else {
			throw new NotFoundException(__('You must provide a evaluation_id in order to attach an item to this test !'));
		}
		
		//On vérifie qu'un paramètre nommé item_id a été fourni et qu'il existe.
		if(isset($this->request->params['named']['item_id'])) {
       		$item_id = intval($this->request->params['named']['item_id']);
       		$this->set('item_id', $item_id);
       		$this->EvaluationsItem->Item->id = $item_id;
			if (!$this->EvaluationsItem->Item->exists()) {
				throw new NotFoundException(__('The item_id provided does not exist !'));
			}
		} else {
			throw new NotFoundException(__('You must provide an item_id in order to attach an item to this test !'));
		}
		
		$association = $this->EvaluationsItem->find('first', array(
	        'conditions' => array('EvaluationsItem.evaluation_id' => $evaluation_id, 'EvaluationsItem.item_id' => $item_id)
	    ));
	    
	    if($association){
	    	$this->EvaluationsItem->delete($association['EvaluationsItem']['id']);
	    	
	    	$this->Session->setFlash(__('L\'item a été correctement dissocié de cette évaluation.'), 'flash_success');
			$this->redirect(array(
			    'controller'    => 'evaluations',
			    'action'        => 'attacheditems', $evaluation_id));
	    }else{
		    $this->Session->setFlash(__('Cette association n\'existe pas'), 'flash_error');
			$this->redirect(array(
			    'controller'    => 'evaluations',
			    'action'        => 'attacheditems', $evaluation_id));
	    }
	}

}
