<?php
App::uses('AppController', 'Controller');
/**
 * Competences Controller
 *
 */
class CompetencesController extends AppController {

	public $helpers = array('Tree');

	public function attachitem() {
		
		//On vérifie qu'un paramètre nommé classroom_id a été fourni et qu'il existe.
		if(isset($this->request->params['named']['evaluation_id'])) {
       		$evaluation_id = intval($this->request->params['named']['evaluation_id']);
       		$this->set('evaluation_id', $evaluation_id);
       		$this->Competence->Item->Evaluation->id = $evaluation_id;
			if (!$this->Competence->Item->Evaluation->exists()) {
				throw new NotFoundException(__('The evaluation_id provided does not exist !'));
			}else{
				$evaluation = $this->Competence->Item->Evaluation->find('first', array(
					'conditions' => array('Evaluation.id' => $evaluation_id),
					'recursive' => -1
				));
				$this->set('eval', $evaluation);
			}
		} else {
			throw new NotFoundException(__('You must provide a evaluation_id in order to attach an item to this test !'));
		}
		
		$this->Competence->contain('Item.Level.title', 'ChildCompetence');
        $stuff = $this->Competence->find('all',  
                array('fields' => array('title', 'lft', 'rght'), 'order' => 'lft ASC')); 
        $this->set('stuff', $stuff);  
    }

    public function bul() {	
    	
    	
		//debug($this->Competence->getPath(6));
		//debug($this->Competence->getPath(9));
		//debug($this->Competence->getPath(19));
    		
        $stuff = $this->Competence->find('all',  
        	array(
            	//'conditions' => array('Competence.id' => array(6)),
            	'fields' => array('title', 'lft', 'rght'), 
            	'order' => 'lft ASC',
            )
        ); 
        $this->set('stuff', $stuff);  
    }


}