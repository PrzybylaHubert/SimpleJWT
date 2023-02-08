<?php

namespace App\Service;

use App\Entity\User;
use App\Service\JsonService;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService extends JsonService
{
    public function __construct(
        private ValidatorInterface $validator,
        private UserPasswordHasherInterface $passwordHasher,
        ) {}

    public function validateUser(User $user): void 
    {
        $errors = $this->validator->validate($user);
        if(count($errors)>0) {
            throw new BadRequestHttpException($errors[0]->getMessage());
        }
    }

    public function hashPassword(User $user): void
    {
        $hashedPassword = $this->passwordHasher->hashPassword($user, $user->getPassword());
        $user->setPassword($hashedPassword);
    }
}