<?php

declare(strict_types=1);

namespace Menu;

use Menu\Shared\FileSystem\Domain\FileSystem;
use Menu\Shared\Flike\Flike;
use Menu\Shared\ServiceLocator\Domain\ServiceLocator;
use Symfony\Component\Yaml\Yaml;

require_once(__DIR__ . '/../vendor/autoload.php');
include_once(__DIR__ . '/configuration/RegisterServices.php');

$flike = new Flike();

var_export(ServiceLocator::getService(FileSystem::class));
var_export(Yaml::parseFile('./menu.yaml'));
