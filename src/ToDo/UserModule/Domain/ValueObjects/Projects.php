<?php


namespace App\ToDo\UserModule\Domain\ValueObjects;


class Projects
{
    /**
     * @var array
     */
    private $projects = [];

    /**
     * Projects constructor.
     * @param array $projects
     *
     */
    public function __construct(array $projects = [])
    {
        $this->projects = $projects;
    }

    /**
     * @return array
     */
    public function getProjects(): array
    {
        return $this->projects;
    }
}