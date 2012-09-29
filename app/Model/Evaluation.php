<?php
App::uses('AppModel', 'Model');
/**
 * Evaluation Model
 *
 * @property Classroom $Classroom
 * @property User $User
 * @property Period $Period
 * @property Result $Result
 * @property Item $Item
 */
class Evaluation extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	public $actsAs = array('Containable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'classroom_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'period_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Classroom' => array(
			'className' => 'Classroom',
			'foreignKey' => 'classroom_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Period' => array(
			'className' => 'Period',
			'foreignKey' => 'period_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Result' => array(
			'className' => 'Result',
			'foreignKey' => 'evaluation_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EvaluationsItem' => array(
			'className' => 'EvaluationsItem',
			'foreignKey' => 'evaluation_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Item' => array(
			'className' => 'Item',
			'joinTable' => 'evaluations_items',
			'foreignKey' => 'evaluation_id',
			'associationForeignKey' => 'item_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Pupil' => array(
			'className' => 'Pupil',
			'joinTable' => 'evaluations_pupils',
			'foreignKey' => 'evaluation_id',
			'associationForeignKey' => 'pupil_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
	
	public function findItemsByPosition($evaluation_id){
		$items = $this->find('all', array(
	        'joins' => array(
			    array('table' => 'evaluations_items',
			        'alias' => 'EvaluationsItem',
			        'type' => 'LEFT',
			        'conditions' => array(
			            'Evaluation.id = EvaluationsItem.evaluation_id',
			        )
			    ),
			    array('table' => 'items',
			        'alias' => 'Item',
			        'type' => 'LEFT',
			        'conditions' => array(
			            'EvaluationsItem.item_id = Item.id',
			        )
			    )
			 ),
			 'recursive' => -1,
			 'fields' => array('EvaluationsItem.position','Item.title','Item.id', 'Evaluation.title'),
			 'conditions' => array('Evaluation.id' => $evaluation_id),
	         'order' => array('EvaluationsItem.position'),
	    ));
	    //debug($items);
	    return $items;
	
	}
	
	public function findPupilsByLevelsInClassroom($id_classroom){
		$levels = $this->Pupil->ClassroomsPupil->Level->find('list', array(
			'conditions' => array(
				'ClassroomsPupil.classroom_id' => $id_classroom
			),
			'recursive' => -1,
			'fields' => 'ClassroomsPupil.level_id',
			'joins' => array(
			    array('table' => 'classrooms_pupils',
			        'alias' => 'ClassroomsPupil',
			        'type' => 'LEFT',
			        'conditions' => array(
			            'Level.id = ClassroomsPupil.level_id',
			        ),
			    )
			 )
		));
		
		$pupils = $this->Pupil->ClassroomsPupil->find('all', array(
			'conditions' => array(
				'ClassroomsPupil.classroom_id' => $id_classroom,
				'ClassroomsPupil.level_id' => $levels
			),
			'recursive' => -1,
			'fields' => array('Pupil.id','Pupil.first_name','Pupil.name','Level.title'),
			'joins' => array(
			    array('table' => 'pupils',
			        'alias' => 'Pupil',
			        'type' => 'LEFT',
			        'conditions' => array(
			            'Pupil.id = ClassroomsPupil.pupil_id',
			        ),
			    ),
			    array('table' => 'levels',
			        'alias' => 'Level',
			        'type' => 'LEFT',
			        'conditions' => array(
			            'Level.id = ClassroomsPupil.level_id',
			        ),
			    )
			 )
		));
		
		foreach($pupils as $pupil){
			$pupilsLevels[$pupil['Level']['title']][$pupil['Pupil']['id']] = $pupil['Pupil']['first_name'].' '.$pupil['Pupil']['name'];				
		}
		
		return $pupilsLevels;
	}
	
	function beforeValidate($options = array()) {
	  if (!isset($this->request->data['Pupil']['Pupil'])
	  || empty($this->request->data['Pupil']['Pupil'])) {
	    $this->invalidate('Pupil'); // fake validation error on Item
	    $this->Pupil->invalidate('Pupil', 'Sélectionnez au moins un élève !');
	  }
	  return true;
	}

}
