<?php

declare(strict_types=1);

namespace Menu\Shared\ServiceLocator\Domain\Service;

use JetBrains\PhpStorm\Pure;

final class ServiceCreator
{
    public static function create(object|callable $value): Service
    {
        /** @infection-ignore-all */ return match (true) {
            is_callable($value) => self::createServiceFactory($value),
            default => self::createService($value)
        };
    }

    #[Pure] private static function createService(object $value): RegularService
    {
        return RegularService::create($value);
    }

    private static function createServiceFactory(callable $value): ServiceFactory
    {
        return ServiceFactory::create($value);
    }
}
