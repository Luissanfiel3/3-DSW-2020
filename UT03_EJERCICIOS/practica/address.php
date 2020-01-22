<?php

require "geo.php";
class Address
{
    private $street;
    private $suite;
    private $city;
    private $zipcode;
    private $geo;

    public function __construct($street, $suite, $city, $zipcode, $lat, $lng)
    {
        $this->street = $street;
        $this->suite = $suite;
        $this->city = $city;

        $this->geo = new Geo($lat, $lng);
    }

    public function __setStreet($value)
    {
        $this->street = $value;
    }

    public function __setCity($value)
    {
        $this->city = $value;
    }


}
