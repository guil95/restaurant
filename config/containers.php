<?php

use App\App\Infra\DAO\User;
use App\Domain\User\UserService;
use App\Domain\Merchant\MerchantService;
use App\App\Infra\DAO\Merchant;

$container = new \DI\Container();

$db = [
    'driver' => getenv('DB_DRIVER'),
    'charset' => getenv('DB_CHARSET'),
    'host' => getenv('DB_HOST'),
    'port' => getenv('DB_PORT'),
    'dbname' => getenv('DB_NAME'),
    'user' => getenv('DB_USER'),
    'pass' => getenv('DB_PASSWORD')
];

$conn = function () use ($db) {
    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container->set(UserService::class, function () use ($conn) {
    return new UserService(
        new User($conn())
    );
});

$container->set(MerchantService::class, function () use ($conn) {
    return new MerchantService(
        new Merchant($conn())
    );
});
