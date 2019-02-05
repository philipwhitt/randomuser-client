<?php

namespace RandomUser;

use GuzzleHttp\Client;

class Generator {

	private $client;

	public function __construct() {
		$this->client = new Client([
			'base_uri' => 'https://api.randomuser.me/',
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
		return $this->getUsers($num, (new Filter)->setGender(User::MALE));
	}

	public function getFemales($num) {
		return $this->getUsers($num, (new Filter)->setGender(User::FEMALE));
	}


	// Worker methods

	public function getUser($type=null) {
		$params = [];

		if (!is_null($type)) {
			$params['gender'] = $type;
		}

		$json = json_decode($this->client->get('', ['query' => $params])->getBody(), true);

		return $this->mapUser($json['results'][0]);
	}

	public function getUsers($num, Filter $filter = null) {
		$params = array();
		$params['results'] = $num;

		if ($filter) {
			if ($filter->getGender()) {
				$params['gender'] = $filter->getGender();
			}

			if ($filter->getNationality()) {
				$params['nationality'] = $filter->getNationality();
			}
		}

		$json = json_decode($this->client->get('', ['query' => $params])->getBody(), true);

		$data = array();
		foreach ($json['results'] as $encUser) {
			$data[] = $this->mapUser($encUser);
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
			->setZip($encUser['location']['postcode'])

			->setUsername($encUser['login']['username'])
			->setPassword($encUser['login']['password'])
			->setSalt($encUser['login']['salt'])
			->setMd5($encUser['login']['md5'])
			->setSha1($encUser['login']['sha1'])
			->setSha256($encUser['login']['sha256'])

			->setRegistered($encUser['registered'])
			->setDateOfBirth($encUser['dob'])
			->setPhone($encUser['phone'])
			->setCell($encUser['cell'])
			->setPicture($encUser['picture']['medium']);

		return $user;
	}

}
