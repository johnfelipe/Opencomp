<?php
class ReportsController extends AppController {

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->set('title_for_layout', __('Modifier un bulletin'));
		
		$this->Report->id = $id;
		if (!$this->Report->exists()) {
			throw new NotFoundException(__('Invalid report'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if ($this->Report->save($this->request->data)) {
				$this->Session->setFlash(__('Le bulletin a été correctement mis à jour.'), 'flash_success');
				$this->redirect(array('controller' => 'classrooms','action' => 'viewreports', $this->request->data['Report']['classroom_id']));
			} else {
				$classroom_id = $this->request->data['Report']['classroom_id'];
				$this->set('classroom_id', $classroom_id);
				$this->Session->setFlash(__('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.'), 'flash_error');
			}
		} else {
			$this->request->data = $this->Report->read(null, $id);
			
			$classroom_id = $this->request->data['Classroom']['id'];
			$this->set('report_id', $id);
			$this->set('classroom_id', $classroom_id);
		}
		
		$this->loadModel('Competence');
		$competences = $this->Competence->generateTreeList(null, null, null, '',-1);
		
		$this->loadModel('Classroom');
		$this->Classroom->recursive = 0;
		$this->Classroom->id = $classroom_id;
		$classroom = $this->Classroom->read();
		
		$this->loadModel('Period');
		$periods = $this->Period->find('list', array(
			'conditions' => array('establishment_id' => $classroom['Classroom']['establishment_id']),
			'recursive' => 0));

		$this->set(compact('classrooms', 'users', 'periods', 'pupils', 'competences'));
	}
	
}