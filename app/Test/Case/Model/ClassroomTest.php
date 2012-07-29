<?php
App::uses('Classroom', 'Model');

/**
 * Classroom Test Case
 *
 */
class ClassroomTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.classroom',
		'app.user',
		'app.classrooms_user',
		'app.establishment',
		'app.academy',
		'app.academies_user',
		'app.period',
		'app.year',
		'app.evaluation',
		'app.establishments_user',
		'app.item',
		'app.competence',
		'app.competences_user',
		'app.pupil',
		'app.tutor',
		'app.level',
		'app.result',
		'app.classrooms_pupil'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Classroom = ClassRegistry::init('Classroom');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Classroom);

		parent::tearDown();
	}

}
