<?php
App::uses('AppController', 'Controller');
/**
 * Results Controller
 *
 * @property Result $Result
 */
class ResultsController extends AppController {

	public $components = array('RequestHandler');

	public function selectpupil(){
		//On vérifie qu'un paramètre nommé evaluation_id a été fourni et qu'il existe.
		if(isset($this->request->params['named']['evaluation_id'])) {
       		$evaluation_id = intval($this->request->params['named']['evaluation_id']);
       		$this->set('evaluation_id', $evaluation_id);
       		$this->Result->Evaluation->id = $evaluation_id;
			if (!$this->Result->Evaluation->exists()) {
				throw new NotFoundException(__('The evaluation_id provided does not exist !'));
			}
		} else {
			throw new NotFoundException(__('You must provide a evaluation_id in order to enter results for items !'));
		}
		
		if ($this->request->is('post')) {
			$pupil_id = intval($this->request->data['Result']['pupil_id']);
			$this->Result->Pupil->id = $pupil_id;
			if (!$this->Result->Pupil->exists()) {
				$this->Session->setFlash(__('Le code barre élève que vous avez flashé est inconnu !'), 'flash_error');
			} else {
				$this->redirect(array('action' => 'add', 'evaluation_id' => $evaluation_id, 'pupil_id' => $pupil_id));
			}
		}
	}
	
	public function add(){
		//On vérifie qu'un paramètre nommé evaluation_id a été fourni et qu'il existe.
		if(isset($this->request->params['named']['evaluation_id'])) {
       		$evaluation_id = intval($this->request->params['named']['evaluation_id']);
       		$this->set('evaluation_id', $evaluation_id);
       		$this->Result->Evaluation->id = $evaluation_id;
			if (!$this->Result->Evaluation->exists()) {
				throw new NotFoundException(__('The evaluation_id provided does not exist !'));
			}
		} else {
			throw new NotFoundException(__('You must provide a evaluation_id in order to enter results for items !'));
		}
		
		if(isset($this->request->params['named']['pupil_id'])) {
       		$pupil_id = intval($this->request->params['named']['pupil_id']);
       		$this->set('pupil_id', $pupil_id);
       		$this->Result->Pupil->id = $pupil_id;
			if (!$this->Result->Pupil->exists()) {
				throw new NotFoundException(__('The pupil_id provided does not exist !'));
			}
		} else {
			throw new NotFoundException(__('You must provide a pupil_id in order to enter results for items !'));
		}
		
		$hasItems = $this->Result->Evaluation->EvaluationsItem->find('all', array(
	        'conditions' => array('evaluation_id' => $evaluation_id),
	        'recursive' => 0
	    ));
	    if(empty($hasItems)){
		    $this->Session->setFlash(__('Impossible de saisir des résultats, aucun item associé à cette évaluation !'), 'flash_error');
		    $this->redirect(array('controller' => 'evaluations', 'action' => 'attacheditems', $evaluation_id));
	    }
		
		$this->Result->Evaluation->contain('Item');
		$eval = $this->Result->Evaluation->find('first', array(
	        'conditions' => array('Evaluation.id' => $evaluation_id),
	    ));
	    $this->set('eval', $eval);
	    
	    $pupil = $this->Result->Pupil->find('first', array(
	        'conditions' => array('id' => $pupil_id),
	        'recursive' => -1
	    ));
	    $this->set('pupil', $pupil);
		
		if ($this->request->is('post')) {
			
			
		}
	}
	
	public function bul(){
	
		if(isset($this->request->params['named']['output_type'])) {
       		$output_type = strval($this->request->params['named']['output_type']);

			if ($output_type == 'pdf') {
				$this->set('output_type', 'pdf');
				Configure::write('debug',0);
				$this->response->type('pdf');
				$this->layout = 'pdf';
			}elseif ($output_type == 'html') {
				$this->layout = 'pdf';
			}else{
				throw new NotFoundException(__('Wrong output type !'));
			}
			
			$items = $this->Result->find('all', array(
			'fields' => array('result'),
			'contain' => array('Item.Competence.id', 'Item.title')));
		
			$this->set('items', $items);
				
			foreach($items as $item){
					$comp[] = $item['Item']['competence_id'];
			}
			
			$comp = array_values(array_unique($comp));
			
			//debug($comp);
			
			foreach($comp as $id_comp){
				$search_results[] = $this->Result->Item->Competence->getPath($id_comp, array('id'));
			}
			
			foreach($search_results as $result_competence){
				foreach($result_competence as $competence){
					$comp_to_show[] = $competence['Competence']['id'];
				}
			}
			
			$comp_to_show = array_values(array_unique($comp_to_show));
	        
	        $competences = $this->Result->Item->Competence->generateTreeListWithDepth(array('Competence.id' => $comp_to_show));
	        $this->set('competences', $competences);
			
		} else {
			throw new NotFoundException(__('You must provide an output type !'));
		}
	}
	
}
