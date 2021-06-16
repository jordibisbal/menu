<?php

declare(strict_types=1);

use Menu\Shared\FileSystem\Infrastructure\NativeFileSystem as NativeFileSystemAlias;
use Menu\Shared\ServiceLocator\Domain\ServiceLocator;

const SERVICE_FILE_SYSTEM = 'FileSystem';

ServiceLocator::setService(new NativeFileSystemAlias(), SERVICE_FILE_SYSTEM);
