<?php

declare(strict_types=1);

use Menu\Shared\FileSystem\Domain\FileSystem;
use Menu\Shared\FileSystem\Infrastructure\NativeFileSystem;
use Menu\Shared\ServiceLocator\Domain\ServiceLocator;

ServiceLocator::setAsService(new NativeFileSystem(), FileSystem::class);
