<?php

namespace Peg\Bundles\ApiBundle\GraphQL\Mutation;

use League\Tactician\CommandBus;
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

    public function createPegLocationEvent(Peg $peg, string $location)
    {
        // create a new peg location
        var_dump($peg);
        var_dump($location);
    }

}