<?php

namespace RandomUser;

use Fliglio\Web\RestResource;
use Fliglio\Web\MediaType;

class Generator {

	private $resource;

	public function __construct() {
		$this->resource = new RestResource('api.randomuser.me/');
		$this->resource->accept(MediaType::JSON);
	}


	// Facade methods

	public function getMale() {
		return $this->getUser(User::MALE);
	}

	public function getFemale() {
		return $this->getUser(User::FEMALE);
	}

	public function getMales($num) {
		return $this->getUsers($num, User::MALE);
	}

	public function getFemales($num) {
		return $this->getUsers($num, User::FEMALE);
	}


	// Worker methods

	public function getUser($type=null) {
		$params = array();

		if (!is_null($type)) {
			$params['gender'] = $type;
		}

		$encData = $this->resource->get($params)->getContent();

		return $this->mapUser($encData['results'][0]['user']);
	}

	public function getUsers($num, $type=null) {
		$params = array();
		$params['results'] = $num;

		if (!is_null($type)) {
			$params['gender'] = $type;
		}

		$encData = $this->resource->get($params)->getContent();

		$data = array();
		foreach ($encData['results'] as $encUser) {
			$data[] = $this->mapUser($encUser['user']);
		}
		return $data;
	}

	private function mapUser($encUser) {
		$user = new User();
		$user->setEmail($encUser['email'])
			->setGender($encUser['gender'])
			->setFirstName($encUser['name']['first'])
			->setLastName($encUser['name']['last'])
			->setStreetAddress($encUser['location']['street'])
			->setCity($encUser['location']['city'])
			->setState($encUser['location']['state'])
			->setZip($encUser['location']['zip'])
			->setUsername($encUser['username'])
			->setPassword($encUser['password'])
			->setSalt($encUser['salt'])
			->setMd5($encUser['md5'])
			->setSha1($encUser['sha1'])
			->setSha256($encUser['sha256'])
			->setRegistered($encUser['registered'])
			->setDateOfBirth($encUser['dob'])
			->setPhone($encUser['phone'])
			->setCell($encUser['cell'])
			->setSSN($encUser['SSN'])
			->setPicture($encUser['picture']);

		return $user;
	}

}