<?php

namespace GSB\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class Visitor implements UserInterface
{
    
    private $visitorID;
    private $sector;
    private $laboratory;
    private $lastName;
    private $firstName;
    private $address;
    private $zipCode;
    private $city;
    private $hiringDate;
    private $userName;
    private $password;
    private $salt;
    private $role;
    private $visitortype;
    
    public function setVisitorID($visitorID) {
        $this->visitorID = $visitorID;
    }

    public function setSector($sector) {
        $this->sector = $sector;
    }

    public function setLaboratory($laboratory) {
        $this->laboratory = $laboratory;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setHiringDate($hiringDate) {
        $this->hiringDate = $hiringDate;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setVisitortype($visitortype) {
        $this->visitortype = $visitortype;
    }

        public function getVisitorID() {
        return $this->visitorID;
    }

    public function getSector() {
        return $this->sector;
    }

    public function getLaboratory() {
        return $this->laboratory;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function getCity() {
        return $this->city;
    }

    public function getHiringDate() {
        return $this->hiringDate;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getUserName() {
        return $this->userName;
    }
    public function getSalt() {
        return $this->salt;
    }
    public function getRole() {
        return $this->role;
    }

    public function getVisitortype() {
        return $this->visitortype;
    }

     public function getRoles()
    {
        return array($this->getRole());
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        // Nothing to do here
    }   

   
}

