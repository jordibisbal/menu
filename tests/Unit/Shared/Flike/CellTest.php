<?php
declare(strict_types=1);

namespace Test\Unit\Shared\Flike;

use Menu\Shared\Flike\Cell;
use PHPUnit\Framework\TestCase;
use TypeError;
use function PHPUnit\Framework\assertNotSame;
use function PHPUnit\Framework\assertSame;

final class CellTest extends TestCase
{
    public function testsACellCanStoreAnInteger(): void
    {
        assertSame(123, Cell::create(123)->value());
    }

    public function testsACellCanStoreAnString(): void
    {
        assertSame('123', Cell::create('123')->value());
    }

    public function testsACellCanStoreAnArray(): void
    {
        assertSame([123], Cell::create([123])->value());
    }

    public function testsACellCanStoreAFloat(): void
    {
        assertSame([12.3], Cell::create([12.3])->value());
    }

    public function testsACellCanStoreACallable(): void
    {
        $fn = fn () => true;
        assertSame($fn, Cell::create($fn)->value());
    }

    public function testsACellCanStoreAnObject(): void
    {
        $objectCreator = fn() => (object)['a' => 1];

        $object = $objectCreator();
        assertSame($object, Cell::create($object)->value());
        assertNotSame($objectCreator(), Cell::create($object)->value());
    }
}
