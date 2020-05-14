<?php


namespace App\ToDo\UserModule\Domain\Entities;


use App\ToDo\CommonModule\Domain\ValueObject\Id;

class Task
{
    /**
     * @var int
     */
    const STATUS_COMPLETED = 1;

    /**
     * @var int
     */
    const STATUS_IN_WORK = 0;

    /**
     * @var Id
     */
    private $id;

    /**
     * @var Id
     */
    private $projectId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $status;

    /**
     * Task constructor.
     * @param Id $id
     * @param Id $projectId
     * @param string $name
     * @param int $status
     */
    public function __construct(Id $id, Id $projectId, string $name, int $status = 0)
    {
        $this->id = $id;
        $this->projectId = $projectId;
        $this->name = $name;
        $this->status = $status;
    }

    /**
     * @param string $name
     */
    public function changeName(string $name): void
    {
        $this->name = $name;
    }

    public function changeStatusCompleted(): void
    {
        $this->status = self::STATUS_COMPLETED;
    }

    public function changeStatusInWork(): void
    {
        $this->status = self::STATUS_IN_WORK;
    }

    /**
     * @return Id
     */
    public function getId(): Id { return $this->id; }

    /**
     * @return Id
     */
    public function getProjectId(): Id { return $this->projectId; }

    /**
     * @return string
     */
    public function getName(): string { return $this->name; }

    /**
     * @return int
     */
    public function getStatus(): int { return $this->status; }
}