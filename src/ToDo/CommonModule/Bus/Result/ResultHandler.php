<?php


namespace App\ToDo\CommonModule\Bus\Result;


class ResultHandler implements ResultHandlerInterface
{
    /**
     * @var array
     */
    private $result;

    /**
     * @var array
     */
    private $errors = [];

    /**
     * @var int
     */
    private $statusCode = 200;

    /**
     * @param array $result
     * @return ResultHandlerInterface
     */
    public function setResult(array $result): ResultHandlerInterface
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return array
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * @param array $errors
     * @return ResultHandlerInterface
     */
    public function setErrors(array $errors): ResultHandlerInterface
    {
        $this->errors = $errors;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param int $code
     * @return ResultHandlerInterface
     */
    public function setStatusCode(int $code = 500): ResultHandlerInterface
    {
        $this->statusCode = $code;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}