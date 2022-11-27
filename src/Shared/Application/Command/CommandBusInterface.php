<?php

namespace App\Shared\Application\Command;

interface CommandBusInterface
{
    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function execute(CommandInterface $command): mixed;
}