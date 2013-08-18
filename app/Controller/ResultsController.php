<?php
App::uses('AppController', 'Controller');
/**
 * Results Controller
 *
 * @property Result $Result
 */
class ResultsController extends AppController {

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
	
	public function viewbul($id = null){	
		$this->set('title_for_layout', __('Visualiser une classe'));
		
		//On charge le modèle report et on récupère les infos du bulletin à générer.
		$this->loadModel('Report');
		$this->Report->id = $id;
		if (!$this->Report->exists()) {
			throw new NotFoundException(__('The report_id provided does not exist !'));
		}
		$report = $this->Report->find('first', array(
			'conditions' => array('Report.id' => $id)
		));
		$this->set('report', $report);
		
		$classroom = $this->Report->Classroom->find('first', array(
			'conditions' => array('Classroom.id' => $report['Classroom']['id'])
		));		
		$this->set('classroom', $classroom);

		$ReqPupils = $this->Result->find('all', array(
			'fields' => array('pupil_id'),
			'order' => array('name', 'first_name'),
			'conditions' => array(
				'Evaluation.period_id' => $report['Report']['period_id'],
				'Evaluation.classroom_id' => $report['Classroom']['id']
			),
			'contain' => array(
				'Pupil.id',
				'Evaluation.Period.id',
				'Evaluation.Classroom.id'
			)
		));
		
		foreach($ReqPupils as $pupils){
			$pup[] = $pupils['Pupil']['id'];
		}
		$pup = array_values(array_unique($pup));
		$nbpup = count($pup);
		foreach($pup as $ind => $id){
			$pourcent[$ind] = round((100 / $nbpup) * ($ind+1),1);
		}
		$tab = array('pupils' => $pup, 'pourcent' => $pourcent, 'report_id' => $report['Report']['id'], 'period_id' => implode(",",$report['Report']['period_id']), 'classroom_id' => $report['Classroom']['id']);
		$this->set('pupils', json_encode(json_encode($tab)));		
	}
	
	public function bul(){
	
		if(!isset($this->request->params['named']['output_type'])) {
       		throw new NotFoundException(__('You must provide an output type !')); 		
       	} else {
			$output_type = strval($this->request->params['named']['output_type']);
		}
		
		if(!isset($this->request->params['named']['pupil_id']) || !is_numeric($this->request->params['named']['pupil_id'])) {
       		throw new NotFoundException(__('You must provide pupil_id !')); 		
       	} else {
			$pupil =  intval($this->request->params['named']['pupil_id']);
		}
		
		if(!isset($this->request->params['named']['report_id']) || !is_numeric($this->request->params['named']['report_id'])) {
       		throw new NotFoundException(__('You must provide report_id !')); 		
       	} else {
			$report_id =  intval($this->request->params['named']['report_id']);
		}
		
		$this->set('pupil_id', $pupil);
		
		$this->loadModel('Report');
		$this->Report->id = $report_id;
		if(!$this->Report->exists()) {
			throw new NotFoundException(__('The report_id provided does not exist !'));
		}
		$report = $this->Report->find('first', array(
			'conditions' => array('Report.id' => $report_id)
		));
		
		$this->set('classroom_id', $report['Classroom']['id']);
		$this->set('period_id', implode(",",$report['Report']['period_id']));
		
		$this->set('report', $report);

		if ($output_type == 'pdf') {
			$this->set('output_type', 'pdf');
			//Configure::write('debug',0);
			//$this->response->type('pdf');
			$this->layout = 'pdf';
		}elseif ($output_type == 'html') {
			$this->layout = 'pdf';
		}else{
			throw new NotFoundException(__('Wrong output type !'));
		}
		
		$items = $this->Result->find('all', array(
			'fields' => array('result'),
			'conditions' => array(
				'Pupil.id' => $pupil,
				'Evaluation.period_id' => $report['Report']['period_id'],
				'Evaluation.classroom_id' => $report['Classroom']['id']
			),
			'contain' => array(
				'Item.Competence.id', 
				'Item.title',
				'Pupil.id',
				'Pupil.name',
				'Pupil.first_name',
				'Evaluation.Period.id',
				'Evaluation.Classroom.id'
			)
		));
	
		if(empty($items)){
			$this->Session->setFlash(__('Aucun résultat n\'a été saisi pour cet élève', 'flash_error'));
			$this->redirect(array(
			    'controller'    => 'results',
			    'action'        => 'bul'
			));
		}
			
		$this->set('items', $items);
			
		foreach($items as $item){
				$comp[] = $item['Item']['competence_id'];
		}
		
		$comp = array_values(array_unique($comp));
		
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
	}
	
	function concat_bul(){
		$this->layout = 'ajax';
		//debug($this->request->data);
	
		App::import('Vendor','fpdi/fpdf'); 
		App::import('Vendor','fpdi/fpdi'); 
		
		function ajouteFichier($pdf,$file)
		{
			$nbPage = $pdf->setSourceFile($file);
			
			for ($i = 1; $i <= $nbPage; $i++) {
		        $tplidx = $pdf->ImportPage($i);
		        $size = $pdf->getTemplatesize($tplidx);
		        $pdf->AddPage('P', array($size['w'], $size['h']));
		        $pdf->useTemplate($tplidx);
		    }
		}
		
		$pdf = new FPDI();
		
		foreach($this->request->data['pupils'] as $pupil_id){
			ajouteFichier($pdf,"files/".$this->request->data['classroom_id']."_".str_replace(',','',$this->request->data['period_id'])."_".$pupil_id.".pdf");
		}
		
		$pdf->Output("files/".$this->request->data['classroom_id']."_".str_replace(',','',$this->request->data['period_id']).".pdf","F");
		
		foreach($this->request->data['pupils'] as $pupil_id){
			unlink("files/".$this->request->data['classroom_id']."_".str_replace(',','',$this->request->data['period_id'])."_".$pupil_id.".pdf");
		}
	
	}
	
	function download(){
		$this->layout = 'ajax';
		if(!isset($this->request->params['named']['filename'])) {
       		throw new NotFoundException(__('You must provide a filename !')); 		
       	} else {
			$filename = strval($this->request->params['named']['filename']);
		}
		
		header('Content-disposition: attachment; filename='.$filename);
		header('Content-type: application/pdf');
		readfile('files/'.$filename);
		unlink('files/'.$filename);
	}
	
}
