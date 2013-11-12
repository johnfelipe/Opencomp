<?php
App::uses('Level', 'Model');

/**
 * Level Test Case
 *
 */
class LevelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.level',
		'app.cycle',
		'app.classrooms_pupil',
		'app.item',
		'app.items_level'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Level = ClassRegistry::init('Level');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Level);

		parent::tearDown();
	}

}
