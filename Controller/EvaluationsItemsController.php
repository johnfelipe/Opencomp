<?php
App::uses('AppController', 'Controller');
/**
 * EvaluationsItems Controller
 *
 * @property EvaluationsItem $EvaluationsItem
 */
class EvaluationsItemsController extends AppController {

	public function attachitem(){
		//On vérifie que les paramètres nommés evaluation_id et item_id ont été fournis et qu'ils existent.
        $evaluation_id = $this->CheckParams->checkForNamedParam('Evaluation','evaluation_id', $this->request->params['named']['evaluation_id']);
        $item_id = $this->CheckParams->checkForNamedParam('Item','item_id', $this->request->params['named']['item_id']);

	    if($this->EvaluationsItem->isItemAlreadyAttachedToEvaluation($this->request->params['named']['evaluation_id'],$this->request->params['named']['item_id'])){
		    $this->Session->setFlash(__('Impossible d\'ajouter cet item à cette évaluation, il y est déjà associé.'), 'flash_error');
			$this->redirect(array(
			    'controller'    => 'competences',
			    'action'        => 'attachitem', 
			    'evaluation_id' => $this->request->params['named']['evaluation_id']));
	    }else{
	    	$lastItemPosition = $this->EvaluationsItem->find('count', array(
		        'conditions' => array('EvaluationsItem.evaluation_id' => $this->request->params['named']['evaluation_id'])
		    ));
			$nextItemPosition = $lastItemPosition+1;
			
		    $data = array(
				'EvaluationsItem' => array(
					'evaluation_id' => $this->request->params['named']['evaluation_id'],
					'item_id' => $this->request->params['named']['item_id'],
					'position' => $nextItemPosition
				)
			);
			
			$this->EvaluationsItem->create();
			$this->EvaluationsItem->save($data);
			
			$this->Session->setFlash(__('L\'item sélectionné a été correctement associé à l\'évaluation.'), 'flash_success');
			$this->redirect(array('controller' => 'evaluations', 'action' => 'attacheditems', $this->request->params['named']['evaluation_id']));
	    }			
	}
	
	public function additem(){	
		$this->set('title_for_layout', __('Ajouter un item'));
		
		//On vérifie que les paramètres nommés evaluation_id et competence_id ont été fournis et qu'ils existent.
        $evaluation_id = $this->CheckParams->checkForNamedParam('Evaluation','evaluation_id', $this->request->params['named']['evaluation_id']);
        $competence_id = $this->CheckParams->checkForNamedParam('Competence','competence_id', $this->request->params['named']['competence_id']);

		$levels = $this->EvaluationsItem->Item->Level->find('list', array('recursive' => 0));
		$this->set('levels', $levels);
		
		$eval = $this->EvaluationsItem->Evaluation->find('first', array(
	        'conditions' => array('id' => $this->request->params['named']['evaluation_id']),
	        'recursive' => -1
	    ));
	    $this->set('eval', $eval);
		
		$this->set('path', $this->_tabPathToString($this->EvaluationsItem->Item->Competence->getPath($this->request->params['named']['competence_id'])));
		
		if ($this->request->is('post')) {			
			$lastItemPosition = $this->EvaluationsItem->find('count', array(
		        'conditions' => array('EvaluationsItem.evaluation_id' => $this->request->params['named']['evaluation_id'])
		    ));
			$nextItemPosition = $lastItemPosition+1;
			
			$this->EvaluationsItem->Item->create();
			if ($this->EvaluationsItem->Item->save($this->request->data)) {
				$data = array(
					'EvaluationsItem' => array(
						'evaluation_id' => $this->request->params['named']['evaluation_id'],
						'item_id' => $this->EvaluationsItem->Item->id,
						'position' => $nextItemPosition
					)
				);
				
				$this->EvaluationsItem->create();
				$this->EvaluationsItem->save($data);
				
				$this->Session->setFlash(__('L\'item a été correctement créé et associé à l\'évaluation.'), 'flash_success');
				$this->redirect(array('controller' => 'evaluations', 'action' => 'attacheditems', $this->request->params['named']['evaluation_id']));
			} else {
				$this->Session->setFlash(__('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.'), 'flash_error');
			}
		}
	}
	
	private function _tabPathToString($path){
	    $mypath = '';
	    foreach($path as $competence){
	    	$mypath .= $competence['Competence']['title'].' <i class="icon-chevron-right"></i> ';
	    }
	    $mypath = substr($mypath, 0, -36);
	    
	    return $mypath;
	}
	
	public function addunrateditem(){
	
		$this->set('title_for_layout', __('Ajouter un item non évalué'));

        //On vérifie que les paramètres nommés period_id et competence_id ont été fournis et qu'ils existent.
        $period_id = $this->CheckParams->checkForNamedParam('Period','period_id', $this->request->params['named']['period_id']);
        $competence_id = $this->CheckParams->checkForNamedParam('Competence','competence_id', $this->request->params['named']['competence_id']);
		
		$levels = $this->EvaluationsItem->Item->Level->find('list', array('recursive' => 0));
		$this->set('levels', $levels);
		
		$this->set('path', $this->_tabPathToString($this->EvaluationsItem->Item->Competence->getPath($this->request->params['named']['competence_id'])));
		
		if ($this->request->is('post')) {	

            $evaluation = $this->EvaluationsItem->Evaluation->searchIfAutogeneratedTestExists(
                $this->data['Item']['classroom_id'],
                $this->request->params['named']['period_id']
            );

			//Si l'évaluation factice n'existe pas, on la crée		    
		    if(!$evaluation)
		    {
                $evaluation_id = $this->EvaluationsItem->Evaluation->AutoGenerateTestForUnratedItems(
                    $this->data['Item']['classroom_id'],
                    $this->request->params['named']['period_id']
                );
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
						'position' => 1
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
				$this->redirect(array('controller' => 'classrooms', 'action' => 'viewunrateditems', $this->data['Item']['classroom_id']));
			} else {
				$this->Session->setFlash(__('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.'), 'flash_error');
			}
		}
		
	}
	
	public function moveup(){
		//On vérifie que les paramètres nommés evaluation_id et item_id ont été fournis et qu'ils existent.
        $evaluation_id = $this->CheckParams->checkForNamedParam('Evaluation','evaluation_id', $this->request->params['named']['evaluation_id']);
        $item_id = $this->CheckParams->checkForNamedParam('Item','item_id', $this->request->params['named']['item_id']);

		$itemToEdit = $this->EvaluationsItem->findByEvaluationIdAndItemId($evaluation_id, $item_id);
		
		if(empty($itemToEdit)){
			throw new NotFoundException(__('The item_id and evaluation_id provided does not exist !'));
		}else{
			if($itemToEdit['EvaluationsItem']['position'] == 1){
				$this->Session->setFlash(__('Impossible de déplacer cet item vers le haut, il est déjà à la première position !'), 'flash_error');
				$this->redirect(array('controller' => 'evaluations', 'action' => 'attacheditems', $evaluation_id));
			}else{
				$secondItemToEdit = $this->EvaluationsItem->findByEvaluationIdAndPosition($evaluation_id, $itemToEdit['EvaluationsItem']['position']-1);
				
				$this->_updatePositionItem($itemToEdit['EvaluationsItem']['id'], $itemToEdit['EvaluationsItem']['position']-1);
				$this->_updatePositionItem($secondItemToEdit['EvaluationsItem']['id'], $secondItemToEdit['EvaluationsItem']['position']+1);
				
				$this->redirect(array('controller' => 'evaluations', 'action' => 'attacheditems', $evaluation_id));
			}
		}				
	}
	
	public function movedown(){
        //On vérifie que les paramètres nommés evaluation_id et item_id ont été fournis et qu'ils existent.
        $evaluation_id = $this->CheckParams->checkForNamedParam('Evaluation','evaluation_id', $this->request->params['named']['evaluation_id']);
        $item_id = $this->CheckParams->checkForNamedParam('Item','item_id', $this->request->params['named']['item_id']);

		$itemToEdit = $this->EvaluationsItem->findByEvaluationIdAndItemId($evaluation_id, $item_id);
		
		if(empty($itemToEdit)){
			throw new NotFoundException(__('The item_id and evaluation_id provided does not exist !'));
		}else{
			$lastItemPosition = $this->EvaluationsItem->find('count', array(
		        'conditions' => array('EvaluationsItem.evaluation_id' => $evaluation_id)
		    ));
			if($itemToEdit['EvaluationsItem']['position'] == $lastItemPosition){
				$this->Session->setFlash(__('Impossible de déplacer cet item vers le bas, il est déjà à la dernière position !'), 'flash_error');
				$this->redirect(array('controller' => 'evaluations', 'action' => 'attacheditems', $evaluation_id));
			}else{
				$secondItemToEdit = $this->EvaluationsItem->findByEvaluationIdAndPosition($evaluation_id, $itemToEdit['EvaluationsItem']['position']+1);
				
				$this->_updatePositionItem($itemToEdit['EvaluationsItem']['id'], $itemToEdit['EvaluationsItem']['position']+1);
				$this->_updatePositionItem($secondItemToEdit['EvaluationsItem']['id'], $secondItemToEdit['EvaluationsItem']['position']-1);
				
				$this->redirect(array('controller'  => 'evaluations', 'action' => 'attacheditems', $evaluation_id));
			}
		}
	}
	
	private function _updatePositionItem($itemId, $newPosition){
    	$this->EvaluationsItem->read(null, $itemId);
    	$this->EvaluationsItem->set('position', $newPosition);
    	$this->EvaluationsItem->save();
	}
	
	public function unlinkitem(){
        //On vérifie que les paramètres nommés evaluation_id et item_id ont été fournis et qu'ils existent.
        $evaluation_id = $this->CheckParams->checkForNamedParam('Evaluation','evaluation_id', $this->request->params['named']['evaluation_id']);
        $item_id = $this->CheckParams->checkForNamedParam('Item','item_id', $this->request->params['named']['item_id']);
		
		$association = $this->EvaluationsItem->find('first', array(
	        'conditions' => array('EvaluationsItem.evaluation_id' => $evaluation_id, 'EvaluationsItem.item_id' => $item_id)
	    ));
	    
	    if($association){
	    	$this->EvaluationsItem->delete($association['EvaluationsItem']['id']);
	    	$this->EvaluationsItem->renumberItemsEvaluation($evaluation_id, $association['EvaluationsItem']['position']);
	    	
	    	$this->Session->setFlash(__('L\'item a été correctement dissocié de cette évaluation.'), 'flash_success');
			$this->redirect(array('controller' => 'evaluations', 'action' => 'attacheditems', $evaluation_id));
	    }else{
		    $this->Session->setFlash(__('Cette association n\'existe pas'), 'flash_error');
			$this->redirect(array('controller' => 'evaluations', 'action' => 'attacheditems', $evaluation_id));
	    }
	}
}
