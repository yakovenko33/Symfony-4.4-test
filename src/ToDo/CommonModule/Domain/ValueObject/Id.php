<?php


namespace App\ToDo\CommonModule\Domain\ValueObject;


use Ramsey\Uuid\Uuid;

class Id
{
    /**
     * @var string
     */
    private $id;

    /**
     * Id constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public static function next(): string
    {
        return Uuid::uuid4()->toString();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}