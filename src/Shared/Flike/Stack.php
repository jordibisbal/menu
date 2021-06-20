<?php
declare(strict_types=1);

namespace Menu\Shared\Flike;

use AbstractDataStructures\Stack as AbstractStack;

final class Stack extends AbstractStack
{
    public function type(): string
    {
        return Cell::class;
    }
}
