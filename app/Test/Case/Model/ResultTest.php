<?php
App::uses('Result', 'Model');

/**
 * Result Test Case
 *
 */
class ResultTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.result',
		'app.evaluation',
		'app.classroom',
		'app.user',
		'app.classrooms_user',
		'app.establishment',
		'app.academy',
		'app.academies_user',
		'app.period',
		'app.year',
		'app.establishments_user',
		'app.item',
		'app.competence',
		'app.evaluations_item',
		'app.level',
		'app.cycle',
		'app.classrooms_pupil',
		'app.pupil',
		'app.tutor',
		'app.items_level',
		'app.competences_user',
		'app.evaluations_pupil'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Result = ClassRegistry::init('Result');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Result);

		parent::tearDown();
	}

}
