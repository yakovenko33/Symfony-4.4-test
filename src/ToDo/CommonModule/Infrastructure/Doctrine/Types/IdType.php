<?php


namespace App\ToDo\CommonModule\Infrastructure\Doctrine\Types;


use App\ToDo\CommonModule\Domain\ValueObject\Id;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

class IdType extends GuidType
{
    /***
     * @var string
     */
    const NAME = 'aggregate_id';

    /**
     * @param $value
     * @param AbstractPlatform $platform
     * @return mixed
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->getId();
    }

    /**
     * @param $value
     * @param AbstractPlatform $platform
     * @return Id
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): Id
    {
        return new Id($value);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME;
    }
}