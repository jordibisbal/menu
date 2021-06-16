<?php
declare(strict_types=1);

namespace Menu\Shared\ServiceLocator\Domain;

use Webmozart\Assert\Assert;

final class Service
{

    private object $service;

    private function __construct(object $service)
    {
        $this->service = $service;
    }

    public static function from(object|callable $service): self
    {
        if (is_callable($service)) {
            $service = $service();
            Assert::object($service);
        }

        return new self($service);
    }

    public function service(): object
    {
        return $this->service;
    }

    public function getClass()
    {

    }
}
