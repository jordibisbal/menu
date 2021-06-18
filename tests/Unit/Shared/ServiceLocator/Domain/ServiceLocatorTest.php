<?php
declare(strict_types=1);

namespace Test\Unit\Shared\ServiceLocator\Domain;

use Menu\Shared\ServiceLocator\Domain\Exceptions\UnableToReturnServiceClassName;
use Menu\Shared\ServiceLocator\Domain\Service\ServiceCreator;
use Menu\Shared\ServiceLocator\Domain\ServiceLocator;
use PHPUnit\Framework\TestCase;
use Test\Unit\Shared\ServiceLocator\Domain\Stub\Service;

class ServiceLocatorTest extends TestCase
{
    public function testAServiceLocatorCanAndRetrieveStoreAService(): void
    {
        $service = new Service();
        ServiceLocator::setService(ServiceCreator::create($service), 'myService');

        self::assertSame($service, ServiceLocator::getService('myService'));
    }

    public function testAServiceLocatorCanStoreAServiceWithNoName(): void
    {
        $service = new Service();
        ServiceLocator::setService(ServiceCreator::create($service));

        self::assertSame($service, ServiceLocator::getService(Service::class));
    }

    public function testAServiceLocatorCanStoreAServiceFactory(): void
    {
        $serviceFactory = fn () => new Service();
        ServiceLocator::setService(ServiceCreator::create($serviceFactory), 'serviceFactoryName');

        self::assertInstanceOf(Service::class, ServiceLocator::getService('serviceFactoryName'));
    }

    public function testAServiceLocatorCannotBeStoredWithOutAName(): void
    {
        $serviceFactory = fn () => new Service();

        $this->expectException(UnableToReturnServiceClassName::class);

        ServiceLocator::setService(ServiceCreator::create($serviceFactory));
    }

    public function testGettingTwiceAFromAServiceFactoryReturnDifferentObjects(): void
    {
        $serviceFactory = fn () => new Service();
        ServiceLocator::setService(ServiceCreator::create($serviceFactory), 'serviceFactoryName');

        $firstService = ServiceLocator::getService('serviceFactoryName');
        $secondService = ServiceLocator::getService('serviceFactoryName');

        self::assertNotSame($firstService, $secondService);
    }
}
