<?php

declare(strict_types=1);

use Menu\Shared\FileSystem\Domain\FileSystem;
use Menu\Shared\FileSystem\Infrastructure\NativeFileSystem;
use Menu\Shared\ServiceLocator\Domain\ServiceLocator;

const SERVICE_FILE_SYSTEM = 'FileSystem';

ServiceLocator::setAsService(new NativeFileSystem(), FileSystem::class);
