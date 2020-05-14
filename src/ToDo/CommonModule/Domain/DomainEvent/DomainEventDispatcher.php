<?php


namespace App\ToDo\CommonModule\Domain\DomainEvent;


use App\ToDo\CommonModule\Domain\DomainEvent\DomainEventInterface;

trait DomainEventDispatcher
{
    /**
     * @var array
     */
    private $events = [];

    /**
     * @param DomainEventInterface $event
     */
    public function addEvent(DomainEventInterface $event): void
    {
        $this->events[] = $event;
    }

    public function executeEvent(): void
    {
        //$dispatch;
    }
}