<?php

class Geo
{
    private $lat;
    private $lng;

    public function __construct($lat, $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function __getLat()
    {
        return $this->lat;
     }
}
