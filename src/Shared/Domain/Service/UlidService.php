<?php

declare(strict_types=1);

namespace App\Shared\Domain\Service;

use Symfony\Component\Uid\Ulid;

class UlidService
{
    /**
     * @return string
     */
    public static function generate(): string
    {
        return Ulid::generate();
    }
}