<?php
require '../vendor/autoload.php';
use Slim\Factory\AppFactory;

DG\BypassFinals::enable();
DG\BypassFinals::setWhitelist([
    '*/Tests/*',
]);

$dotenv = Dotenv\Dotenv::create('../');
$dotenv->overload();

require_once '../config/containers.php';

AppFactory::setContainer($container);
$app = AppFactory::create();

require_once '../config/routes.php';

$app->addErrorMiddleware(true, true, true);
$app->addRoutingMiddleware();

$app->run();
