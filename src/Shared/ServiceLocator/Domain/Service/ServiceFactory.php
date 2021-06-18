<?php

declare(strict_types=1);

namespace Menu\Shared\ServiceLocator\Domain\Service;

use Menu\Shared\ServiceLocator\Domain\Exceptions\UnableToReturnServiceClassName;

final class ServiceFactory implements Service
{
    private function __construct(private $factory)
    {
    }

    public static function create(callable $value): self
    {
        return new self($value);
    }

    public function service(): object
    {
        return ($this->factory)();
    }

    public function getClass(): string
    {
        throw UnableToReturnServiceClassName::becauseIsAserviceFactory();
    }
}
