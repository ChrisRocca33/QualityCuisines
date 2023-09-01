<?php
//class to represent an entry on the users table
class User {
    //class properties - match the columns in the
    //users table 
    private $userNo;
    private $eMail;
    private $password;
    private $firstName;
    private $lastName;
    private $userLevel;

    public function __construct($eMail, $password, $firstName, $lastName, $userLevel)  {
        $this->eMail = $eMail;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userLevel = $userLevel;
       // $this->userNo = $userNo;
    }
    
    //get and set the person properties
    public function getUserNo() {
        return $this->userNo;
    }
    public function setUserNo($value) {
        $this->userNo = $value;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($value) {
        $this->password = $value;
    }

    public function getFirstName() {
        return $this->firstName;
    }
    public function setFirstName($value) {
        $this->firstName = $value;
    }

    public function getLastName() {
        return $this->lastName;
    }
    public function setLastName($value) {
        $this->lastName = $value;
    }

    public function getEMail() {
        return $this->eMail;
    }
    public function setEMail($value) {
        $this->eMail = $value;
    }
    
    //get and set the userLevel property
    public function getUserLevel() {
        return $this->userLevel;
    }
    public function setUserLevel($value) {
        $this->userLevel = $value;
    }
}