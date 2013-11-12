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
	    	$lastItemPosition = $this->EvaluationsItem->find('count', array(
		        'conditions' => array('EvaluationsItem.evaluation_id' => $evaluation_id)
		    ));
			$nextItemPosition = $lastItemPosition+1;
			
		    $data = array(
				'EvaluationsItem' => array(
					'evaluation_id' => $evaluation_id,
					'item_id' => $item_id,
					'position' => $nextItemPosition
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
		
		$levels = $this->EvaluationsItem->Item->Level->find('list', array('recursive' => 0));
		$this->set('levels', $levels);
		
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
			$lastItemPosition = $this->EvaluationsItem->find('count', array(
		        'conditions' => array('EvaluationsItem.evaluation_id' => $evaluation_id)
		    ));
			$nextItemPosition = $lastItemPosition+1;
			
			$this->EvaluationsItem->Item->create();
			if ($this->EvaluationsItem->Item->save($this->request->data)) {
				$data = array(
					'EvaluationsItem' => array(
						'evaluation_id' => $evaluation_id,
						'item_id' => $this->EvaluationsItem->Item->id,
						'position' => $nextItemPosition
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
	
	public function addunrateditem(){
	
		$this->set('title_for_layout', __('Ajouter un item non évalué'));
		
		//On vérifie qu'un paramètre nommé evaluation_id a été fourni et qu'il existe.
		if(isset($this->request->params['named']['period_id'])) {
       		$period_id = intval($this->request->params['named']['period_id']);
       		$this->set('period_id', $period_id);
			if (!$this->EvaluationsItem->Evaluation->Period->exists($period_id)) {
				throw new NotFoundException(__('The period_id provided does not exist !'));
			}
		} else {
			throw new NotFoundException(__('You must provide a period_id in order to attach an item to this test !'));
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
		
		$levels = $this->EvaluationsItem->Item->Level->find('list', array('recursive' => 0));
		$this->set('levels', $levels);
		
		$path = $this->EvaluationsItem->Item->Competence->getPath($competence_id);
		$mypath = '';
		foreach($path as $competence){
			$mypath .= $competence['Competence']['title'].' <i class="icon-chevron-right"></i> ';
		}
		$mypath = substr($mypath, 0, -36);
		$this->set('path', $mypath);
		
		if ($this->request->is('post')) {	
		
			//On cherche si l'évaluation factice a déjà été créée pour cette classe et cette période.
			$evaluation = $this->EvaluationsItem->Evaluation->find('first', array(
				'fields' => array('Evaluation.id'),
		        'conditions' => array(
		        	'Evaluation.classroom_id' => $this->data['Item']['classroom_id'],
		        	'Evaluation.period_id' => $period_id,
		        	'Evaluation.unrated' => 1
		        ),
		    ));		
		    
			//Si l'évaluation factice n'existe pas, on la crée		    
		    if(!$evaluation)
		    {
			    $data = array(
					'Evaluation' => array(
						'title' => 'Autogenerated test for unrated items',
						'classroom_id' => $this->data['Item']['classroom_id'],
						'user_id' => $this->data['Item']['user_id'],
						'period_id' => $period_id,
						'unrated' => 1
					)
				);
				
				$this->EvaluationsItem->Evaluation->create();
				$this->EvaluationsItem->Evaluation->save($data,false);
				
				$evaluation_id = $this->EvaluationsItem->Evaluation->id;
			//Si elle existe, on récupère simplement son id :)
		    }else{
			    $evaluation_id = $evaluation['Evaluation']['id'];
		    }

		
			$this->EvaluationsItem->Item->create();
			if ($this->EvaluationsItem->Item->save($this->request->data)) {
				
				$item_id = $this->EvaluationsItem->Item->id;
				
				$data = array(
					'EvaluationsItem' => array(
						'evaluation_id' => $evaluation_id,
						'item_id' => $this->EvaluationsItem->Item->id,
						'position' => 'N/A'
					)
				);
				
				$this->EvaluationsItem->create();
				$this->EvaluationsItem->save($data);
				
				$pupils = $this->EvaluationsItem->Evaluation->Classroom->ClassroomsPupil->findAllByClassroomId($this->data['Item']['classroom_id'],array('pupil_id'),null,null,null,0);
				
				unset($data);
				
				foreach($pupils as $id => $pupil){
					$data[$id]['evaluation_id'] = $evaluation_id;
					$data[$id]['pupil_id'] = $pupil['ClassroomsPupil']['pupil_id'];
					$data[$id]['item_id'] = $item_id;
					$data[$id]['result'] = 'X';			
				}
				
				$this->EvaluationsItem->Evaluation->Result->saveMany($data, array('validate' => false));
				
				$this->Session->setFlash(__('L\'item a été correctement créé et associé à cette période'), 'flash_success');
				$this->redirect(array(
				    'controller'    => 'classrooms',
				    'action'        => 'viewunrateditems', $this->data['Item']['classroom_id']));
			} else {
				$this->Session->setFlash(__('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.'), 'flash_error');
			}
		}
		
	}
	
	public function moveup(){
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
		
		$itemToEdit = $this->EvaluationsItem->findByEvaluationIdAndItemId($evaluation_id, $item_id);
		
		if(empty($itemToEdit)){
			throw new NotFoundException(__('The item_id and evaluation_id provided does not exist !'));
		}else{
			if($itemToEdit['EvaluationsItem']['position'] == 1){
				$this->Session->setFlash(__('Impossible de déplacer cet item vers le haut, il est déjà à la première position !'), 'flash_error');
				$this->redirect(array(
			    'controller'    => 'evaluations',
			    'action'        => 'attacheditems', $evaluation_id));
			}else{
				$secondItemToEdit = $this->EvaluationsItem->findByEvaluationIdAndPosition($evaluation_id, $itemToEdit['EvaluationsItem']['position']-1);
				
				$this->EvaluationsItem->read(null, $itemToEdit['EvaluationsItem']['id']);
				$this->EvaluationsItem->set('position', $itemToEdit['EvaluationsItem']['position']-1);
				$this->EvaluationsItem->save();
				
				$this->EvaluationsItem->read(null, $secondItemToEdit['EvaluationsItem']['id']);
				$this->EvaluationsItem->set('position', $secondItemToEdit['EvaluationsItem']['position']+1);
				$this->EvaluationsItem->save();
				
				$this->redirect(array(
			    'controller'    => 'evaluations',
			    'action'        => 'attacheditems', $evaluation_id));
			}
		}				
	}
	
	public function movedown(){
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
		
		$itemToEdit = $this->EvaluationsItem->findByEvaluationIdAndItemId($evaluation_id, $item_id);
		
		if(empty($itemToEdit)){
			throw new NotFoundException(__('The item_id and evaluation_id provided does not exist !'));
		}else{
			$lastItemPosition = $this->EvaluationsItem->find('count', array(
		        'conditions' => array('EvaluationsItem.evaluation_id' => $evaluation_id)
		    ));
			if($itemToEdit['EvaluationsItem']['position'] == $lastItemPosition){
				$this->Session->setFlash(__('Impossible de déplacer cet item vers le bas, il est déjà à la dernière position !'), 'flash_error');
				$this->redirect(array(
			    'controller'    => 'evaluations',
			    'action'        => 'attacheditems', $evaluation_id));
			}else{
				$secondItemToEdit = $this->EvaluationsItem->findByEvaluationIdAndPosition($evaluation_id, $itemToEdit['EvaluationsItem']['position']+1);
				
				$this->EvaluationsItem->read(null, $itemToEdit['EvaluationsItem']['id']);
				$this->EvaluationsItem->set('position', $itemToEdit['EvaluationsItem']['position']+1);
				$this->EvaluationsItem->save();
				
				$this->EvaluationsItem->read(null, $secondItemToEdit['EvaluationsItem']['id']);
				$this->EvaluationsItem->set('position', $secondItemToEdit['EvaluationsItem']['position']-1);
				$this->EvaluationsItem->save();
				
				$this->redirect(array(
			    'controller'    => 'evaluations',
			    'action'        => 'attacheditems', $evaluation_id));
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
