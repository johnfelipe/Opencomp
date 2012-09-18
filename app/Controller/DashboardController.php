<?php
App::uses('AppController', 'Controller');

class DashboardController extends AppController {

	public function index() {
		$this->set('title_for_layout', __('Synthèse : votre tableau de bord personnel'));
		
		$this->loadModel('Classroom');
		
		$this->Classroom->contain('Establishment');
		$classrooms = $this->Classroom->findAllByUserId($this->Auth->user('id'));
		$this->set('classrooms', $classrooms);
	}
	
}