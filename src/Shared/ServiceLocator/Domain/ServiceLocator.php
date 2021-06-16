<?php

declare(strict_types=1);

namespace Menu\Shared\ServiceLocator\Domain;

use Assert\Assert;

final class ServiceLocator
{
    private static Services $servicesRegistry;

    public static function getService(string $serviceName): object
    {
        return self::servicesRegister()->get($serviceName)->service();
    }

    public static function setService(Service $service, string $serviceName = null): void
    {
        $serviceName ??= $service->getClass();
        self::$servicesRegistry = self::servicesRegister()->set($serviceName, Service::from($service));
    }

    private static function servicesRegister(): Services
    {
        self::$servicesRegistry ??= Services::createEmpty();

        return self::$servicesRegistry;
    }
}
