<?php

declare(strict_types=1);

namespace App\Users\Domain\Factory;

use App\Users\Domain\Entity\User;

class UserFactory
{
    /**
     * @param string $email
     * @param string $password
     * @return User
     */
    public function create(string $email, string $password): User
    {
        return new User($email, $password);
    }
}