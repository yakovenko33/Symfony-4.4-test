<?php
declare(strict_types = 1);

namespace App\ToDo\UserModule\Application\SingUp\Validation;


use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class SingUp
{
    /**
     * @return Collection
     */
    static function getConstraints(): Collection
    {
        return new Collection([
            "email" => [
                new NotBlank(['message' => 'email-is-blank']),
                new Email(['message' => 'not-valid-email']),
                new Length([
                    'max' => 50,
                    'maxMessage' => 'email-length-max-50',
                    'allowEmptyString' => false,
                ])
            ],
            "password" => [
                new NotBlank(['message' => 'password-is-blank']),
                new Length([
                    'max' => 50,
                    'maxMessage' => 'password-length-max-50',
                    'allowEmptyString' => false,
                ])
            ],
            "password_repeat" => [
                new NotBlank(['message' => 'password_repeat-is-blank']),
                new Length([
                    'max' => 50,
                    'maxMessage' => 'password-length-max-50',
                    'allowEmptyString' => false,
                ])
            ],
            "password_equal" => new IsTrue([
                "message" => "password-and-password_repeat-is-not-equal"
            ])
        ]);
    }
}