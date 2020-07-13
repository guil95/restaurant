<?php

namespace App\App\Controllers;


use App\App\Infra\ResponseCode;
use App\Domain\User\Exception\UserAuth;
use App\Domain\User\Exception\UserNotFound;
use App\Domain\User\UserService;
use Firebase\JWT\JWT;
use Psr\Container\ContainerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class AuthController
{
    protected ContainerInterface $container;

    private UserService $userService;

    /**
     * AuthController constructor.
     * @param ContainerInterface $container
     * @param UserService $userService
     */
    public function __construct(ContainerInterface $container, UserService $userService)
    {
        $this->container = $container;
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function auth(Request $request, Response $response, $args)
    {
        $requestBody = $request->getParsedBody();

        try {
            $user = $this->userService->auth(
                $requestBody['email'],
                $requestBody['password']
            );
        } catch (UserNotFound | UserAuth $e) {
            $response->getBody()->write("Falha ao realizar login, usuário ou senha inválidos");
            return $response->withStatus(ResponseCode::HTTP_BAD_REQUEST);
        }

        $token = [
            "user" => $user->toArray(),
            "exp" => time() + 3600
        ];

        $key = getenv('SECRET_JWT');
        $jwt = JWT::encode($token, $key);

        $response->getBody()->write(
            json_encode(['token' => $jwt])
        );

        return $response->withStatus(ResponseCode::HTTP_OK);
    }
}
