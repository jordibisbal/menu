<?php

declare(strict_types=1);

namespace Menu\Shared\ServiceLocator\Domain\Exceptions;

use RuntimeException;

final class UnableToReturnServiceClassName extends RuntimeException
{
    public static function becauseIsAServiceFactory(): self
    {
        throw new self('A generic factory cannot return provided service class name');
    }
}
