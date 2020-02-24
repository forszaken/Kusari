<?php

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    FilesystemLoader::class => function () {
        return new FilesystemLoader(dirname(__DIR__) . '/views/');
    },
    Environment::class => function (ContainerInterface $container) {
        return new Environment($container->get(FilesystemLoader::class));
    },
]);
