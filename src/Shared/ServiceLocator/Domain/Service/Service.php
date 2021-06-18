<?php

declare(strict_types=1);

namespace Menu\Shared\ServiceLocator\Domain\Service;

interface Service
{
    public function service(): object;

    public function getClass(): string;
}
