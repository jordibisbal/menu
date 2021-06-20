<?php
declare(strict_types=1);

namespace Test\Unit\Shared\Service\Service;

use Menu\Shared\ServiceLocator\Domain\Service\RegularService;
use Menu\Shared\ServiceLocator\Domain\Service\ServiceCreator;
use Menu\Shared\ServiceLocator\Domain\Service\ServiceFactory;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertNotSame;
use function PHPUnit\Framework\assertSame;

final class ServiceCreatorTest extends TestCase
{
    public function testCanCreateFromAnObject()
    {
        $object = (object) ['a' => 1];
        $service = ServiceCreator::create($object);

        assertInstanceOf(RegularService::class, $service);
        assertSame($object, $service->service());
    }

    public function testCanCreateFromACallable()
    {
        $callable = fn () => (object) ["a" => 1];
        $service = ServiceCreator::create($callable);

        assertInstanceOf(ServiceFactory::class, $service);
        assertNotSame($callable(), $service->service());
        assertEquals($callable(), $service->service());
    }
}
