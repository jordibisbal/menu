<?php

declare(strict_types=1);

namespace Menu\Shared\ServiceLocator\Domain\Service;

use JetBrains\PhpStorm\Pure;

final class RegularService implements Service
{
    private function __construct(private object $value) {}

    #[Pure] public static function create(object $value): self
    {
        return new  self($value);
    }

    public function service() : object
    {
        return $this->value;
    }

    public function getClass(): string
    {
        return get_class($this->value);
    }
}
