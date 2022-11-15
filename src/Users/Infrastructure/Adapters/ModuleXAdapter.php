<?php

declare(strict_types=1);

namespace App\Users\Infrastructure\Adapters;

use App\ModuleX\Infrastructure\API\API;

class ModuleXAdapter
{
    /**
     * @param API $moduleXApi
     */
    public function __construct(private readonly API $moduleXApi)
    {

    }

    /**
     * @return array
     */
    public function getSomeData(): array
    {
        $this->moduleXApi->getSomeData();//mapping
        return[];
    }
}