<?php


namespace App\ToDo\CommonModule\Bus\Handler;


use App\ToDo\CommonModule\Bus\Interfaces\CommandInterface;
use App\ToDo\CommonModule\Bus\Result\ResultHandlerInterface;
use App\ToDo\UserModule\Application\SingUp\Validation\SingUp as Validation;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractHandler
{
    /**
     * @var ResultHandlerInterface
     */
    protected $resultHandler;

    /**
     * @var
     */
    protected $validator;

    /**
     * SingUpHandler constructor.
     * @param ResultHandlerInterface $resultHandler
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ResultHandlerInterface $resultHandler,
        ValidatorInterface $validator
    ) {
        $this->resultHandler = $resultHandler;
        $this->validator = $validator;
    }

    /**
     * @param CommandInterface $command
     * @return ResultHandlerInterface
     */
    public function __invoke(CommandInterface $command): ResultHandlerInterface
    {
        $resultValidate = $this->validator->validate($command->toArray(), Validation::getConstraints());
        if ($resultValidate->count() > 0) {
            return $this->resultHandler->setErrors($this->getErrors($resultValidate))->setStatusCode();
        } else {
            $this->afterValidate();
        }

        return $this->resultHandler;
    }

    /**
     * @param ConstraintViolationListInterface $resultValidate
     * @return array
     */
    private function getErrors(ConstraintViolationListInterface $resultValidate): array
    {
        $errors = [];
        foreach ($resultValidate as $error) {
            $errors = array_merge($errors, [$error->getPropertyPath() => $error->getMessage()]);
        }

        return $errors;
    }

    abstract protected function afterValidate(): void;
}