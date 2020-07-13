<?php

namespace App\App\Controllers;

use App\App\Infra\ResponseCode;
use App\Domain\Order\OrderService;
use Firebase\JWT\JWT;
use Psr\Container\ContainerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class OrderController
{
    protected $container;

    private OrderService $service;

    /**
     * OrderController constructor.
     * @param ContainerInterface $container
     * @param OrderService $serivce
     */
    public function __construct(ContainerInterface $container, OrderService $serivce)
    {
        $this->container = $container;
        $this->service = $serivce;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function create(Request $request, Response $response, $args)
    {
        $requestBody = $request->getParsedBody();
die("<pre>" . __FILE__ . " - " . __LINE__ . "\n" . print_r($requestBody, true) . "</pre>");
        $order = $this->service->create();

        $response->getBody()->write(json_encode($order->toArray()));
        return $response->withStatus(ResponseCode::HTTP_CREATED);
    }
}
