<?php

namespace App\App\Controllers;

use App\App\Infra\ResponseCode;
use App\Domain\User\UserService;
use Psr\Container\ContainerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class UserController
{
    protected $container;

    private UserService $service;

    /**
     * UserController constructor.
     * @param ContainerInterface $container
     * @param UserService $service
     */
    public function __construct(ContainerInterface $container, UserService $service)
    {
        $this->container = $container;
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     * @throws \Exception
     */
    public function findAll(Request $request, Response $response, $args)
    {
        $users = $this->service->findAll();

        $response->getBody()->write(json_encode($users));
        return $response->withStatus(ResponseCode::HTTP_OK);
    }

}
