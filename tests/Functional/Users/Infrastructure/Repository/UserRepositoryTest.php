<?php

declare(strict_types=1);

namespace App\Tests\Functional\Users\Infrastructure\Repository;

use App\Tests\Resource\Fixture\UserFixture;
use App\Users\Domain\Factory\UserFactory;
use App\Users\Infrastructure\Repository\UserRepository;
use Exception;
use Faker\Factory;
use Faker\Generator;
use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use Liip\TestFixturesBundle\Services\DatabaseTools\AbstractDatabaseTool;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserRepositoryTest extends WebTestCase
{
     /**
     * @var Generator
     */
    private Generator $faker;
    /**
     * @var UserRepository|null
     */
    private ?UserRepository $repository;
    /**
     * @var AbstractDatabaseTool
     */
    private AbstractDatabaseTool $databaseTool;



    /**
     * @return void
     * @throws Exception
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->repository = static::getContainer()->get(UserRepository::class);
        $this->faker = Factory::create();
        $this->databaseTool = static::getContainer()->get(DatabaseToolCollection::class)->get();//liip/test-fixtures-bundle
    }

    /**
     * @return void
     */
    public function test_user_added_successful(): void
    {
        $email = $this->faker->email();
        $password = $this->faker->password();
        $user = (new UserFactory())->create($email, $password);

        // adding user
        $this->repository->add($user);

        //assert
        $existingUser = $this->repository->findByUlid($user->getUlid());
        $this->assertEquals($user->getUlid(), $existingUser->getUlid());

    }

    /**
     * @return void
     */
    public function testFindByUlid(): void
    {
        //arrange
        $executor = $this->databaseTool->loadFixtures([UserFixture::class]);
        $user = $executor->getReferenceRepository()->getReference(UserFixture::REFERENCE);

        //act
        $existingUser = $this->repository->findByUlid($user->getUlid());

        //assert
        $this->assertEquals($user->getUlid(), $existingUser->getUlid());
    }
}
