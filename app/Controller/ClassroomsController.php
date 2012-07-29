<?php
App::uses('AppController', 'Controller');
/**
 * Classrooms Controller
 *
 * @property Classroom $Classroom
 */
class ClassroomsController extends AppController {

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->set('title_for_layout', __('Visualiser une classe'));
		$this->Classroom->id = $id;
		if (!$this->Classroom->exists()) {
			throw new NotFoundException(__('The classroom_id provided does not exist !'));
		}
		$classroom = $this->Classroom->find('first', array(
			'conditions' => array('Classroom.id' => $id)));
		$this->set('classroom', $classroom);
		
		$classroompupil = $this->Classroom->ClassroomsPupil->find('all', array(
			'conditions' => array('ClassroomsPupil.classroom_id' => $id),
			'recursive' => -1,
			'fields' => array('Pupil.id','Pupil.first_name','Pupil.name','Pupil.sex','Pupil.birthday','Level.title'),
			'order' => array('Pupil.name','Pupil.first_name'),
			'joins' => array(
			    array('table' => 'levels',
			        'alias' => 'Level',
			        'type' => 'LEFT',
			        'conditions' => array(
			            'Level.id = ClassroomsPupil.level_id',
			        ),
			    ),
			    array('table' => 'pupils',
			        'alias' => 'Pupil',
			        'type' => 'LEFT',
			        'conditions' => array(
			            'Pupil.id = ClassroomsPupil.pupil_id',
			        ),
			    )
			 )
		));
		$this->set('ClassroomsPupil', $classroompupil);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set('title_for_layout', __('Ajouter une classe'));
		if ($this->request->is('post')) {
			$this->Classroom->create();
			if ($this->Classroom->save($this->request->data)) {
				$this->Session->setFlash(__('La nouvelle classe a été correctement ajoutée.'), 'flash_success');
				$this->redirect(array(
				    'controller'    => 'establishments',
				    'action'        => 'view', $this->request->data['Classroom']['establishment_id']));
			} else {
				$this->Session->setFlash(__('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.'), 'flash_error');
			}
		}
		
		//Si on a passé un establishment_id en paramètre, on présélectionne la liste déroulante avec la valeur passée.
		if(isset($this->request->params['named']['establishment_id']))
		    $this->set('establishment_id', $this->request->params['named']['establishment_id']);
        else
            $this->set('establishment_id', null);
		
		$users = $this->Classroom->User->find('list');
		$years = $this->Classroom->Year->find('list');
		$establishments = $this->Classroom->Establishment->find('list');
		$pupils = $this->Classroom->Pupil->find('list');
		$users = $this->Classroom->User->find('list');
		$this->set(compact('users', 'years', 'establishments', 'pupils', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->set('title_for_layout', __('Modifier une classe'));
		$this->Classroom->id = $id;
		if (!$this->Classroom->exists()) {
			throw new NotFoundException(__('The classroom_id provided does not exist !'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Classroom->save($this->request->data)) {
				$this->Session->setFlash(__('La classe a été correctement mise à jour'), 'falsh_success');
				$this->redirect(array(
				    'controller'    => 'classrooms',
				    'action'        => 'view', $this->request->data['Classroom']['id']));
			} else {
				$this->Session->setFlash(__('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.'), 'flash_error');
			}
		} else {
			$this->request->data = $this->Classroom->read(null, $id);
		}
		$users = $this->Classroom->User->find('list');
		$years = $this->Classroom->Year->find('list');
		$establishments = $this->Classroom->Establishment->find('list');
		$pupils = $this->Classroom->Pupil->find('list');
		$users = $this->Classroom->User->find('list');
		$this->set(compact('users', 'years', 'establishments', 'pupils', 'users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Classroom->id = $id;
		if (!$this->Classroom->exists()) {
			throw new NotFoundException(__('The classroom_id provided does not exist !'));
		}
		if ($this->Classroom->delete()) {
			$this->Session->setFlash(__('Classroom deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Classroom was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
