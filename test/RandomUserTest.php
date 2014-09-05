<?php

require_once dirname(dirname(__FILE__)).'/vendor/autoload.php';

use RandomUser\Generator;
use RandomUser\User;

class RandomUserTest extends PHPUnit_Framework_TestCase {

	public function testGetUser() {
		$gen = new Generator();

		$user = $gen->getUser();

		$this->assertTrue(strlen($user->getFirstName()) > 0);
	}

	public function testGetMale() {
		$gen = new Generator();

		$user = $gen->getMale();

		$this->assertEquals($user->getGender(), User::MALE);
	}

	public function testGetFemale() {
		$gen = new Generator();

		$user = $gen->getFemale();

		$this->assertEquals($user->getGender(), User::FEMALE);
	}

	public function testGetUsers() {
		$gen = new Generator();

		$users = $gen->getUsers(10);

		$this->assertEquals(count($users), 10);
	}

	public function testGetFemales() {
		$gen = new Generator();

		$users = $gen->getFemales(10);

		$this->assertEquals($users[0]->getGender(), User::FEMALE);
	}

	public function testGetMales() {
		$gen = new Generator();

		$users = $gen->getMales(10);

		$this->assertEquals($users[0]->getGender(), User::MALE);
	}

}
