<?php


namespace App\ToDo\UserModule\Domain\Entities;


use App\ToDo\CommonModule\Domain\ValueObject\Id;
use App\ToDo\UserModule\Domain\ValueObjects\Tasks;

class Project
{
    /**
     * @var Id
     */
    private $id;

    /**
     * @var
     */
    private $userId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Tasks
     */
    private $tasks;

    /**
     * Project constructor.
     * @param Id $id
     * @param Id $userId
     * @param string $name
     * @param array $tasks
     */
    public function __construct(Id $id, Id $userId, string $name, array $tasks = [])
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->name = $name;
        $this->tasks = new Tasks($tasks);
    }

    /**
     * @param string $name
     */
    public function changeName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Id
     */
    public function getId(): Id { return $this->id; }

    /**
     * @return mixed
     */
    public function getUserId() { return $this->userId; }

    /**
     * @return string
     */
    public function getName(): string { return $this->name; }

    /**
     * @return array
     */
    public function getTasks(): array { return $this->tasks->getTasks(); }
}