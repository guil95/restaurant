<?php
$app->get('/users', \App\App\Controllers\UserController::class. ':findAll')
    ->add(new \App\App\Middleware\ParseRequest())
    ->add(new \App\App\Middleware\ValidMerchant($container))
    ->add(
        new Tuupola\Middleware\JwtAuthentication([
            "secure" => false,
            "secret" => getenv("SECRET_JWT")
        ])
    )
;
$app->post('/order/create', \App\App\Controllers\OrderController::class.':create')
    ->add(new \App\App\Middleware\ParseRequest())
    ->add(new \App\App\Middleware\ValidMerchant($container))
    ->add(
        new Tuupola\Middleware\JwtAuthentication([
            "secure" => false,
            "secret" => getenv("SECRET_JWT")
        ])
    )
;



$app->post('/auth', \App\App\Controllers\AuthController::class. ':auth')
    ->add(new \App\App\Middleware\ParseRequest())
;
