<?php
App::uses('EvaluationsItem', 'Model');

/**
 * EvaluationsItem Test Case
 *
 */
class EvaluationsItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.evaluations_item',
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
		'app.result',
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
		$this->EvaluationsItem = ClassRegistry::init('EvaluationsItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvaluationsItem);

		parent::tearDown();
	}

}
