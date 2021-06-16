<?php

namespace Menu\Shared\ServiceLocator\Domain;

use AbstractDataStructures\Collection;

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
