<?php
App::uses('AppModel', 'Model');
/**
 * EvaluationsItem Model
 *
 * @property Evaluation $Evaluation
 * @property Item $Item
 */
class EvaluationsItem extends AppModel {

	public $actsAs = array('Containable');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Evaluation' => array(
			'className' => 'Evaluation',
			'foreignKey' => 'evaluation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public function isItemAlreadyAttachedToEvaluation($evaluation_id, $item_id){
        return $this->find('first', array(
            'conditions' => array(
                'EvaluationsItem.evaluation_id' => $evaluation_id,
                'EvaluationsItem.item_id' => $item_id
            )
        ));
    }
}
