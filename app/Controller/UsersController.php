<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	public function login(){
		$iduser = $this->Auth->user('id');
		if(!empty($iduser))
			$this->redirect(array('controller' => 'academies', 'action' => 'index'));
			
		$this->layout = 'auth';
		if($this->request->is('post')){
			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirect());
			}else{
				$this->Session->setFlash("Votre login ou votre mot de passe ne correspond pas !", "flash_error"); 
			}
		}
	}
	
	public function logout(){
		$this->Auth->logout();
		$this->Session->setFlash('Vous êtes maintenant déconnecté.','flash_success');
		$this->redirect(array('controller' => 'users', 'action' => 'login'));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
	    $this->set('title_for_layout', __('Liste des utilisateurs'));
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('L\'utilisateur demandé n\'existe pas !'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	    $this->set('title_for_layout', __('Ajouter un utilisateur'));
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Le nouvel utilisateur a été correctement ajouté'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.'), 'flash_error');
			}
		}
		$academies = $this->User->Academy->find('list');
		$classrooms = $this->User->Classroom->find('list');
		$competences = $this->User->Competence->find('list');
		$establishments = $this->User->Establishment->find('list');
		$this->set(compact('academies', 'classrooms', 'competences', 'establishments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */	
	public function edit($id = null) {
	    $this->set('title_for_layout', __('Modifier un utilisateur'));
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('L\'utilisateur demandé n\'existe pas !'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('L\'utilisateur a été correctement mis à jour'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.'), 'flash_error');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$academies = $this->User->Academy->find('list');
		$classrooms = $this->User->Classroom->find('list');
		$competences = $this->User->Competence->find('list');
		$establishments = $this->User->Establishment->find('list');
		$this->set(compact('academies', 'classrooms', 'competences', 'establishments'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('L\'utilisateur demandé n\'existe pas !'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('L\'utilisateur a été correctement supprimé'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('L\'utilisateur n\'a pas pu être supprimé'), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
