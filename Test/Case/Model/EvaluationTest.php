<?php
App::uses('Evaluation', 'Model');

/**
 * Evaluation Test Case
 *
 */
class EvaluationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.competences_user',
		'app.pupil',
		'app.tutor',
		'app.result',
		'app.classrooms_pupil',
		'app.level',
		'app.cycle',
		'app.items_level',
		'app.evaluations_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Evaluation = ClassRegistry::init('Evaluation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Evaluation);

		parent::tearDown();
	}

}
