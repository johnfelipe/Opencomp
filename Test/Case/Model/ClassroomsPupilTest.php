<?php
App::uses('ClassroomsPupil', 'Model');

/**
 * ClassroomsPupil Test Case
 *
 */
class ClassroomsPupilTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.classrooms_pupil',
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
		'app.result',
		'app.level',
		'app.cycle',
		'app.items_level'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ClassroomsPupil = ClassRegistry::init('ClassroomsPupil');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ClassroomsPupil);

		parent::tearDown();
	}

}
