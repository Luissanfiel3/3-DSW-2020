<?php
class Company
{
    private $name;
    private $catchPhrase;
    private $bs;

    public function __construct($name, $catchPhrase, $bs)
    {
        $this->name = $name;
        $this->catchPhrase = $catchPhrase;
        $this->bs = $bs;
    }


    public function __getName()
    {
        return $this->name;
    }

    public function __catchPhrase()
    {
        return $this->catchPhrase;
    }

    public function __getBs()
    {
        return $this->bs;
    }
}
