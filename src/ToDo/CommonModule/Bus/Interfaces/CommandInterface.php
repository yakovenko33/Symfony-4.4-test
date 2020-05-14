<?php


namespace App\ToDo\CommonModule\Bus\Interfaces;


interface CommandInterface
{
    /**
     * @return array
     */
    public function toArray(): array;
}