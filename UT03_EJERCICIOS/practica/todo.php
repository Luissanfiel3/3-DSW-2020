<?php

/**Contiene los atributos de una tarea */
class Todo
{
    private $userId;
    private $id;
    private $title;
    private $completed;

    public function __construct($userId, $id, $title, $completed)
    {
        $this->userId = $userId;
        $this->id = $id;
        $this->title = $title;
        $this->completed = $completed;
    }

    public function __getUserId()
    {
        return $this->userId;
    }

    public function __getId()
    {
        return $this->id;
    }

    public function __getTitle()
    {
        return $this->title;
    }
    public function __getCompleted()
    {
        return $this->completed;
    }
}
