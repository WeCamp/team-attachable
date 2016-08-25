<?php

namespace Peg\Bundles\ApiBundle\GraphQL\Mutation;

use League\Tactician\CommandBus;
use Overblog\GraphQLBundle\Error\UserWarning;
use Peg\Bundles\ApiBundle\Document\LocationEvent;
use Peg\Bundles\ApiBundle\Document\Peg;
use Peg\Domain\Commands\UpdateLocation;

final class PegLocationEventMutation
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function createPegLocationEvent(Peg $peg, string $location) : LocationEvent
    {
        $pegEvent = LocationEvent::create($peg, "added a location", $location);
        $command = new UpdateLocation($pegEvent);

        try {
            $this->commandBus->handle($command);
        } catch (\Exception $e) {
            throw new UserWarning($e->getMessage());
        }

        return $pegEvent;
    }

}
