<?php
require "company.php";
require "address.php";
class User
{
    /**Clase Principal contiene los atributos de todos los usuarios */
    private $id;
    private $name;
    private $username;
    private $email;
    private $address;
    private $phone;
    private $website;
    private $company;


    public function __construct($id, $name, $username, $email, $phone, $website,
    $street, $suite , $city ,$zipcode ,$lat ,$lng , $catchPhrase , $bs)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->website = $website;
        // Crear objeto tipo direccion y pasar al contructor de address y Company
        $this->address = new Address($street, $suite, $city, $zipcode, $lat, $lng);
        $this->company = new Company($name, $catchPhrase, $bs);
    }

    public function __getId()
    {
        return $this->id;
    }

    public function __getName()
    {
        return $this->name;
    }

    public function __getUserName()
    {
        return  $this->username;
    }

    public function __getEmail()
    {
        return $this->email;
    }

    public function __getPhone()
    {
        return  $this->phone;
    }

    public function __getWebsite()
    {
        return  $this->website;
    }
}
