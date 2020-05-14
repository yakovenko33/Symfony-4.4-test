<?php
declare(strict_types = 1);

namespace App\ToDo\UserModule\Application\SingUp\Command;


use App\ToDo\CommonModule\Bus\Interfaces\CommandInterface;

class SingUp implements CommandInterface
{
    /**
     * @var string;
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $passwordRepeat;

    /**
     * SingUp constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->passwordRepeat = $data['password_repeat'];
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getPasswordRepeat(): string
    {
        return $this->passwordRepeat;
    }

    /**
     * @return bool
     */
    private function passwordEqual(): bool
    {
        return strcmp($this->password, $this->passwordRepeat) === 0 ? true : false;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "email" => $this->email,
            "password" => $this->password,
            "password_repeat" => $this->passwordRepeat,
            "password_equal" => $this->passwordEqual()
        ];
    }
}