<?php
App::uses('AppController', 'Controller');
/**
 * Competences Controller
 *
 */
class CompetencesController extends AppController {

public $helpers = array('Tree');

public function index() {
        $stuff = $this->Competence->find('all',  
                array('fields' => array('title', 'lft', 'rght'), 'order' => 'lft ASC')); 
        $this->set('stuff', $stuff); 
    }

}
