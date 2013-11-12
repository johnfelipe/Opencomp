<?php
App::uses('Period', 'Model');

/**
 * Period Test Case
 *
 */
class PeriodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.period',
		'app.year',
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
		'app.competences_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Period = ClassRegistry::init('Period');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Period);

		parent::tearDown();
	}

}
