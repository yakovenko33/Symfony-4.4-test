<?php


namespace App\ToDo\UserModule\Domain\ValueObjects;


class Tasks
{
    /**
     * @var array
     */
    private $tasks; // = []

    /**
     * @param array $tasks
     */
    public function __construct(array $tasks = [])
    {
        $this->tasks = $tasks;
    }

    /**
     * @return array
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }
}