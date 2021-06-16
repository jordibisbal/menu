<?php

declare(strict_types=1);

namespace Menu;

use Menu\Shared\ServiceLocator\Domain\ServiceLocator;
use Symfony\Component\Yaml\Yaml;

require_once(__DIR__ . '/../vendor/autoload.php');

require_once(__DIR__ . '/configuration/RegisterServices.php');

var_export(ServiceLocator::getService(SERVICE_FILE_SYSTEM));
var_export(Yaml::parseFile('./menu.yaml'));
