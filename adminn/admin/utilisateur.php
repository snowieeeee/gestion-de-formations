<?php

class utilisateur {
    private $status;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $profession;
    private $birthdate;
    private $telephone;
    private $CIN;
    private $adress;

    public function __construct($email, $status, $password, $firstName, $lastName, $profession, $birthdate, $telephone, $CIN, $adress){
        $this->status = $status;
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->profession = $profession;
        $this->birthdate = $birthdate;
        $this->telephone = $telephone;
        $this->CIN = $CIN;
        $this->adress = $adress;
    }

    /* Les setters */
    public function setStatus($status){
        $this->status = $status;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    public function setBirthdate($birthdate){
        $this->birthdate = $birthdate;
    }

    public function setTelephone($telephone){
        $this->telephone = $telephone;
    }

    public function setCIN($CIN){
        $this->CIN = $CIN;
    }

    public function setProfession($profession){
        $this->profession = $profession;
    }

    public function setAdresse($adress){
        $this->adress = $adress;
    }

    /* Les getters */
    public function getStatus(){
        return $this->status;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getBirthdate(){
        return $this->birthdate;
    }

    public function getTelephone(){
        return $this->telephone;
    }

    public function getCIN(){
        return $this->CIN;
    }

    public function getProfession(){
        return $this->profession;
    }

    public function getAdress(){
        return $this->adress;
    }
}















?>