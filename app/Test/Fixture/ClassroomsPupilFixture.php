<?php
/**
 * ClassroomsPupilFixture
 *
 */
class ClassroomsPupilFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'classroom_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'pupil_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'level_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'classroom_id' => 1,
			'pupil_id' => 1,
			'level_id' => 1
		),
	);

}
