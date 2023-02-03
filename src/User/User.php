<?php
namespace GeekBrains\LevelTwo\User;

Class User {
    private string $firstName;
    private string $lastName;
    private int $id;

    public function __toString()
		{
			return $this->firstName;
		}

    public function setFirstName($first) {
        $this->firstName = $first;
    }
    public function getFirstName() {
        return $this->firstName;
    }
    public function setLastName($last) {
        $this->lastName = $last;
    }
    public function getLastName() {
        return $this->lastName;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
}