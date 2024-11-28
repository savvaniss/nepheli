<?php
// index.php

use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;
use DI\Container;

require __DIR__ . '/vendor/autoload.php';

// Create Container using PHP-DI
$container = new Container();

// Set up view renderer in the container
$container->set('view', function (ContainerInterface $c) {
    return new PhpRenderer('templates/');
});

// Create App with Container
AppFactory::setContainer($container);
$app = AppFactory::create();

// Add Error Middleware
$app->addErrorMiddleware(true, true, true);

// Include routes
require __DIR__ . '/routes.php';

// Run App
$app->run();
