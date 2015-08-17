<?php

namespace RandomUser;

class Filter {

	private $nationality;
	private $gender;

	public function getNationality() {
		return $this->nationality;
	}
	public function getGender() {
		return $this->gender;
	}

	public function setNationality($nationality) {
		$this->nationality = $nationality;
		return $this;
	}
	public function setGender($gender) {
		$this->gender = $gender;
		return $this;
	}

}