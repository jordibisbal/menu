<?php

declare(strict_types=1);

namespace Menu\Shared\ServiceLocator\Domain\Exceptions;

use RuntimeException;

final class UnableToReturnServiceClassName extends RuntimeException
{
    public static function becauseIsAServiceFactory(): self
    {
        return new self('A service factory cannot return a default service name');
    }
}
