<?php

namespace App\Shared\Infrastructure\Bus;

use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Command\CommandInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class CommandBus implements CommandBusInterface
{
    use HandleTrait;

    /**
     * @param MessageBusInterface $commandBus
     */
    public function __construct(MessageBusInterface $commandBus)
    {
        $this->messageBus = $commandBus;
    }

    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function execute(CommandInterface $command): mixed
    {
        return $this->handle($command);
    }
}