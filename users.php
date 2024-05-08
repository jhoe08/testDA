<?php
class User {
    private $firstname;
    private $middlename;
    private $lastname;
    private $birthday;
    private $department;
    private $position;
    private $address;
    private $city;
    private $province;

    // Setters
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function setMiddlename($middlename) {
        $this->middlename = $middlename;
    }
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function setDepartment($department) {
        $this->department = $department;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setProvince($province) {
        $this->province = $province;
    }

    // Getters
    public function getFirstname() {
        return $this->firstname;
    }
    public function getMiddlename() {
        return $this->middlename;
    }
    public function getLastname() {
        return $this->lastname;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getDepartment() {
        return $this->department;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getCity() {
        return $this->city;
    }

    public function getProvince() {
        return $this->province;
    }

    public function getFullname($initial=false) {
        if($initial) {
            return $this->firstname . ' ' . $this->middlename[0] . '. ' . $this->lastname;
        }
        return $this->firstname . ' ' . $this->middlename . ' ' . $this->lastname;
    }
}


?>