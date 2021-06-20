<?php
declare(strict_types=1);

namespace Menu\Shared\Flike;

use JetBrains\PhpStorm\Pure;

final class Cell
{
    private function __construct(private mixed $value)
    {
    }

    #[Pure] public static function create(int|string|array|float|object|callable $value): Cell
    {
        return new self($value);
    }

    public function value(): int|string|array|float|object|callable
    {
        return $this->value;
    }
}
