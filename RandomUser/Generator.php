<?php

namespace RandomUser;

use GuzzleHttp\Client;

class Generator {

	private $client;

	public function __construct() {
		$this->client = new Client([
			'base_url' => 'http://api.randomuser.me'
		]);
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
		$params = [];

		if (!is_null($type)) {
			$params['gender'] = $type;
		}

		$json = $this->client->get('/', ['query' => $params])->json();

		return $this->mapUser($json['results'][0]['user']);
	}

	public function getUsers($num, $type=null) {
		$params = array();
		$params['results'] = $num;

		if (!is_null($type)) {
			$params['gender'] = $type;
		}

		$json = $this->client->get('/', ['query' => $params])->json();

		$data = array();
		foreach ($json['results'] as $encUser) {
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
			->setPicture($encUser['picture']);

		return $user;
	}

}