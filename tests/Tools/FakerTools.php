<?php

declare(strict_types=1);

namespace App\Tests\Tools;

use Faker\Factory;
use Faker\Generator;

trait FakerTools
{
    /**
     * @return Generator
     */
    public function getFaker(): Generator
    {
        return Factory::create();
    }
}