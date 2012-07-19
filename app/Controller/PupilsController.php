<?php
App::uses('AppController', 'Controller');
/**
 * Pupils Controller
 *
 * @property Pupil $Pupil
 */
class PupilsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pupil->recursive = 0;
		$this->set('pupils', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Pupil->id = $id;
		if (!$this->Pupil->exists()) {
			throw new NotFoundException(__('Invalid pupil'));
		}
		$this->set('pupil', $this->Pupil->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pupil->create();
			if ($this->Pupil->save($this->request->data)) {
				$this->Session->setFlash(__('The pupil has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pupil could not be saved. Please, try again.'));
			}
		}
		$tutors = $this->Pupil->Tutor->find('list');
		$levels = $this->Pupil->Level->find('list');
		$classrooms = $this->Pupil->Classroom->find('list');
		$this->set(compact('tutors', 'levels', 'classrooms'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Pupil->id = $id;
		if (!$this->Pupil->exists()) {
			throw new NotFoundException(__('L\'élève spécifié n\'existe pas !'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pupil->save($this->request->data)) {
				$this->Session->setFlash(__('The pupil has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pupil could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Pupil->read(null, $id);
		}
		$tutors = $this->Pupil->Tutor->find('list');
		$levels = $this->Pupil->Level->find('list');
		$classrooms = $this->Pupil->Classroom->find('list');
		$this->set(compact('tutors', 'levels', 'classrooms'));
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
		$this->Pupil->id = $id;
		if (!$this->Pupil->exists()) {
			throw new NotFoundException(__('Invalid pupil'));
		}
		if ($this->Pupil->delete()) {
			$this->Session->setFlash(__('Pupil deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pupil was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
