<?php
App::uses('AppController', 'Controller');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 */
class SettingsController extends AppController {

	public function index(){
	
		$this->loadModel('Year');	
		$years = $this->Year->find('list');
		$this->set('years', $years);
		
		$currentYear = $this->Setting->find('first', array('conditions' => array('Setting.key' => 'currentYear')));
	    $lastYear = $this->Setting->find('first', array('conditions' => array('Setting.key' => 'lastYear')));
	    
	    if(empty($currentYear))
			$this->set('currentYear', null);
		else
			$this->set('currentYear', $currentYear['Setting']['value']);
			
			
		if(empty($lastYear))
			$this->set('lastYear', null);
		else
			$this->set('lastYear', $lastYear['Setting']['value']);
	
		if ($this->request->is('post') || $this->request->is('put')) {
		    
		    if($this->data['Setting']['currentYear'] == $this->data['Setting']['lastYear']){
			    $this->Session->setFlash(__('L\'année scolaire courante ne peut pas être identique à l\'année scolaire précédente !'), 'flash_error');
		    }else{
			    $this->Setting->read(null, $currentYear['Setting']['value']);
				$this->Setting->set(array('value' => $this->data['Setting']['currentYear']));
				$this->Setting->save();
				
				$this->Setting->read(null, $lastYear['Setting']['value']);
				$this->Setting->set(array('value' => $this->data['Setting']['lastYear']));
				$this->Setting->save();
				
				$this->Session->setFlash(__('Les paramètres ont été correctement mis à jour.'), 'flash_success');
				$this->redirect(array('action'=> 'index'));
		    }	  
	    }  	
	}
}
