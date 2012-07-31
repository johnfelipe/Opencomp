<?php
App::uses('Item', 'Model');

/**
 * Item Test Case
 *
 */
class ItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.items_level',
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
		$this->Item = ClassRegistry::init('Item');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Item);

		parent::tearDown();
	}

}
