<?php
App::uses('ItemsLevel', 'Model');

/**
 * ItemsLevel Test Case
 *
 */
class ItemsLevelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.items_level',
		'app.item',
		'app.competence',
		'app.user',
		'app.classroom',
		'app.classrooms_user',
		'app.year',
		'app.period',
		'app.establishment',
		'app.academy',
		'app.academies_user',
		'app.evaluation',
		'app.result',
		'app.evaluations_item',
		'app.pupil',
		'app.tutor',
		'app.classrooms_pupil',
		'app.level',
		'app.cycle',
		'app.evaluations_pupil',
		'app.competences_user',
		'app.establishments_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ItemsLevel = ClassRegistry::init('ItemsLevel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ItemsLevel);

		parent::tearDown();
	}

}
