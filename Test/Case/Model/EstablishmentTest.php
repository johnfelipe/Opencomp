<?php
App::uses('Establishment', 'Model');

/**
 * Establishment Test Case
 *
 */
class EstablishmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.establishment',
		'app.user',
		'app.classroom',
		'app.classrooms_user',
		'app.establishments_user',
		'app.evaluation',
		'app.item',
		'app.academy',
		'app.academies_user',
		'app.competence',
		'app.competences_user',
		'app.period'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Establishment = ClassRegistry::init('Establishment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Establishment);

		parent::tearDown();
	}

}
