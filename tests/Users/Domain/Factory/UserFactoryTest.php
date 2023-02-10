<?php

declare(strict_types=1);

namespace App\Tests\Users\Domain\Factory;

use App\Users\Domain\Factory\UserFactory;
use PHPUnit\Framework\TestCase;
use App\Users\Domain\Entity\User;

class UserFactoryTest extends TestCase
{
    /**
     * This test creates an instance of the UserFactory class in the setUp method, and then uses the create method to
     * create a User object. The test then asserts that the returned object is an instance of the User class, and
     * that its email and password properties match the expected values.
     *
     * @var UserFactory
     */
    private UserFactory $userFactory;

    protected function setUp(): void
    {
        $this->userFactory = new UserFactory();
    }

    public function testCreate(): void
    {
        $email = 'user@example.com';
        $password = 'password';

        $user = $this->userFactory->create($email, $password);

        $this->assertInstanceOf(User::class, $user);
        $this->assertSame($email, $user->getEmail());
        $this->assertSame($password, $user->getPassword());
    }
}
