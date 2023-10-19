<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . "/../vendor/autoload.php";

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;

$config = Setup::createAnnotationMetadataConfiguration(
    [__DIR__ . "/../src/Entity"],
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);

$conn = [
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'dbname' => 'magazord',
    'user' => 'root',
    'password' => 'root',
];

$entityManager = EntityManager::create($conn, $config);

return ConsoleRunner::createHelperSet($entityManager);