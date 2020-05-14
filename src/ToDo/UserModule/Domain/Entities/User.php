<?php
declare(strict_types = 1);

namespace App\ToDo\UserModule\Domain\Entities;


use App\ToDo\CommonModule\Domain\DomainEvent\DomainEventDispatcher;
use App\ToDo\CommonModule\Domain\ValueObject\Id;
use App\ToDo\UserModule\Domain\DomainEvent\Event\ChangeEmail;
use App\ToDo\UserModule\Domain\DomainEvent\Event\ChangePassword;
use App\ToDo\UserModule\Domain\ValueObjects\Projects;

class User
{
    use DomainEventDispatcher;

    /**
     * @var Id
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var array
     */
    private $projects;
    //private $projects = [];

    /**
     * User constructor.
     * @param Id $id
     * @param string $email
     * @param string $password
     * @param array $projects
     */
    public function __construct(Id $id, string $email, string $password, array $projects = [])
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->projects = new Projects($projects);//$projects;
    }

    /**
     * @param string $email
     */
    public function changeEmail(string $email): void
    {
        $this->email = $email;

        $this->addEvent(new ChangeEmail());
    }

    /**
     * @param string $password
     * @return string
     */
    public function changePassword(string $password): string
    {
        $this->password = $password;

        $this->addEvent(new ChangePassword());
    }

    /**
     * @return Id
     */
    public function getId(): Id { return $this->id; }

    /**
     * @return string
     */
    public function getEmail(): string { return $this->email; }

    /**
     * @return string
     */
    public function getPassword(): string { return $this->password; }

    /**
     * @return array
     */
    public function getProjects(): array { return $this->projects; }
}