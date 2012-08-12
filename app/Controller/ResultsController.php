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
		//@TODO tester d'abord si un résultat a été déjà saisi pour cette évaluation et cet élève.
	
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
		
		$items = $this->Result->Evaluation->findItemsByPosition($evaluation_id);
		
		//Récupération des résultats éventuels
		$qresults = $this->Result->findAllByEvaluationIdAndPupilId($evaluation_id, $pupil_id, array('Result.item_id', 'Result.result'));
		if(!empty($qresults)){
			foreach($qresults as $result){
					$results[$result['Result']['item_id']] = $result['Result']['result'];
			}
		}else{
			$results = array();
		}

	    $this->set('items', $items);
	    $this->set('results', $results);
	    
	    $pupil = $this->Result->Pupil->find('first', array(
	        'conditions' => array('id' => $pupil_id),
	        'recursive' => -1
	    ));
	    $this->set('pupil', $pupil);
		
		if ($this->request->is('post')) {
			$i=0;
			foreach($this->request->data['Results'] as $k => $v){
				$data[$i]['Result']['pupil_id'] = $pupil_id;
				$data[$i]['Result']['evaluation_id'] = $evaluation_id;
				$data[$i]['Result']['item_id'] = $k;
				$data[$i]['Result']['result'] = $v;
				
				$i++;
			}
			
			$this->Result->create();
			$this->Result->saveMany($data, array('validate' => 'all'));

			if(count($this->Result->invalidFields()) == 0){
				$this->Session->setFlash(__('Les résultats de <code>'.$pupil['Pupil']['first_name'].' '.$pupil['Pupil']['name'].'</code> pour l\'évaluation <code>'.$items[0]['Evaluation']['title'].'</code> ont bien été enregistrés.'), 'flash_success');
				$this->redirect(array(
				    'controller'    => 'results',
				    'action'        => 'selectpupil', 
				    'evaluation_id' => $evaluation_id));
			}else{
				$this->Session->setFlash(__('Les résultats de <code>'.$pupil['Pupil']['first_name'].' '.$pupil['Pupil']['name'].'</code> pour l\'évaluation <code>'.$items[0]['Evaluation']['title'].'</code> n\'ont pas pu être  enregistrés car votre saisie est incorrecte.<br />De nouveau, saisissez les résultats de l\'élève.'), 'flash_error');
			}
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
