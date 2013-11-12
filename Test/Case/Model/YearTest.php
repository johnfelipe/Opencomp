<?php
App::uses('Year', 'Model');

/**
 * Year Test Case
 *
 */
class YearTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.year',
		'app.classroom',
		'app.period',
		'app.establishment',
		'app.user',
		'app.classrooms_user',
		'app.establishments_user',
		'app.evaluation',
		'app.item',
		'app.academy',
		'app.academies_user',
		'app.competence',
		'app.competences_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Year = ClassRegistry::init('Year');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Year);

		parent::tearDown();
	}

}
