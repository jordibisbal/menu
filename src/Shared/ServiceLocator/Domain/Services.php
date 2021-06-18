<?php

namespace Menu\Shared\ServiceLocator\Domain;

use AbstractDataStructures\Collection;
use Menu\Shared\ServiceLocator\Domain\Service\Service;

/**
 * @method Service get(string $key)
 */
class Services extends Collection
{
    public function type(): string
    {
        return Service::class;
    }
}
