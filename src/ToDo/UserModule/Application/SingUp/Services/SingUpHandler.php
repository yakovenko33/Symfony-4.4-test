<?php
declare(strict_types = 1);

namespace App\ToDo\UserModule\Application\SingUp\Services;


use App\ToDo\CommonModule\Bus\Handler\AbstractHandler;

class SingUpHandler extends AbstractHandler
{
    protected function afterValidate(): void
    {
        $this->resultHandler->setResult(['id' => 1]);// TODO: Implement afterValidate() method.
    }
}