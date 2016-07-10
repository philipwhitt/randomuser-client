<?php

namespace RandomUser;

class User {

	// Genders
	const MALE = 'male';
	const FEMALE = 'female';

	private $gender;
	private $firstName;
	private $lastName;
	private $streetAddress;
	private $city;
	private $state;
	private $zip;
	private $email;
	private $username;
	private $password;
	private $salt;
	private $md5;
	private $sha1;
	private $sha256;
	private $registered;
	private $dob;
	private $phone;
	private $cell;
	private $SSN;
	private $picture;

	public function getGender() {
		return $this->gender;
	}
	public function getName() {
		return $this->firstName.' '.$this->lastName;
	}
	public function getFirstName() {
		return $this->firstName;
	}
	public function getLastName() {
		return $this->lastName;
	}
	public function getStreetAddress() {
		return $this->streetAddress;
	}
	public function getCity() {
		return $this->city;
	}
	public function getState() {
		return $this->state;
	}
	public function getZip() {
		return $this->zip;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getUsername() {
		return $this->username;
	}
	public function getPassword() {
		return $this->password;
	}
	public function getSalt() {
		return $this->salt;
	}
	public function getMd5() {
		return $this->md5;
	}
	public function getSha1() {
		return $this->sha1;
	}
	public function getSha256() {
		return $this->sha256;
	}
	public function getRegistered() {
		return $this->registered;
	}
	public function getDateOfBirth() {
		return $this->dob;
	}
	public function getPhone() {
		return $this->phone;
	}
	public function getCell() {
		return $this->cell;
	}
	public function getSsn() {
		return $this->SSN;
	}
	public function getPicture() {
		return $this->picture;
	}

	// Setters -----------

	public function setGender($gender) {
		$this->gender = $gender;
		return $this;
	}
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
		return $this;
	}
	public function setLastName($lastName) {
		$this->lastName = $lastName;
		return $this;
	}
	public function setStreetAddress($streetAddress) {
		$this->streetAddress = $streetAddress;
		return $this;
	}
	public function setCity($city) {
		$this->city = $city;
		return $this;
	}
	public function setState($state) {
		$this->state = $state;
		return $this;
	}
	public function setZip($zip) {
		$this->zip = $zip;
		return $this;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}
	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}
	public function setSalt($salt) {
		$this->salt = $salt;
		return $this;
	}
	public function setMd5($md5) {
		$this->md5 = $md5;
		return $this;
	}
	public function setSha1($sha1) {
		$this->sha1 = $sha1;
		return $this;
	}
	public function setSha256($sha256) {
		$this->sha256 = $sha256;
		return $this;
	}
	public function setRegistered($registered) {
		$this->registered = $registered;
		return $this;
	}
	public function setDateOfBirth($dob) {
		$this->dob = $dob;
		return $this;
	}
	public function setPhone($phone) {
		$this->phone = $phone;
		return $this;
	}
	public function setCell($cell) {
		$this->cell = $cell;
		return $this;
	}
	public function setSsn($SSN) {
		$this->SSN = $SSN;
		return $this;
	}
	public function setPicture($picture) {
		$this->picture = $picture;
		return $this;
	}

}
