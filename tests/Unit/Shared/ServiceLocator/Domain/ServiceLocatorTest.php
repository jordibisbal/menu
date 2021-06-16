<?php
declare(strict_types=1);

namespace Test\Unit\Shared\ServiceLocator\Domain;

use Menu\Shared\ServiceLocator\Domain\ServiceLocator;
use PHPUnit\Framework\TestCase;
use Test\Unit\Shared\ServiceLocator\Domain\Stub\Service;

class ServiceLocatorTest extends TestCase
{
    public function testAServiceLocatorCanAndRetrieveStoreAService(): void
    {
        $service = new Service();
        ServiceLocator::setService($service, 'myService');

        self::assertSame($service, ServiceLocator::getService('myService'));
    }

    public function testAServiceLocatorCanStoreAServiceWithNoName(): void
    {
        $service = new Service();
        ServiceLocator::setService($service);

        self::assertSame($service, ServiceLocator::getService(Service::class));
    }

    public function testAServiceLocatorCanStoreAServiceFactory(): void
    {
        $serviceFactory = fn () => new Service();
        ServiceLocator::setService($serviceFactory, 'serviceFactoryName');

        self::assertInstanceOf(Service::class, ServiceLocator::getService('serviceFactoryName'));
    }

    public function testGettingTwiceAFromAServiceFactoryReturnDifferentObjects(): void
    {
        $serviceFactory = fn () => new Service();
        ServiceLocator::setService($serviceFactory, 'serviceFactoryName');

        $firstService = ServiceLocator::getService('serviceFactoryName');
        $secondService = ServiceLocator::getService('serviceFactoryName');

        self::assertNotSame($firstService, $secondService);
    }
}
