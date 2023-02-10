<?php

namespace App\Tests\Shared\Domain\Service;

use App\Shared\Domain\Service\UlidService;
use PHPUnit\Framework\TestCase;


class UlidServiceTest extends TestCase
{
    /**
     * UlidServiceTest, the generate method is called and the returned value is checked to ensure it's a string with
     * a length of 26 characters consisting of only uppercase letters and numbers.
     *
     * @return void
     */
    public function testGenerate()
    {
        $ulid = UlidService::generate();

        $this->assertIsString($ulid);
        $this->assertMatchesRegularExpression('/^[0-9A-Z]{26}$/', $ulid);
    }
}
