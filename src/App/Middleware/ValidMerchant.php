<?php

namespace App\App\Middleware;

use App\App\Infra\ResponseCode;
use App\Domain\Merchant\MerchantService;
use Firebase\JWT\JWT;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

final class ValidMerchant
{
    private ContainerInterface $container;

    /**
     * ValidMerchant constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param Request $request
     * @param RequestHandler $handler
     * @return \Psr\Http\Message\ResponseInterface|Response
     */
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $headers = array_change_key_case($request->getHeaders(), CASE_LOWER);

        if (isset($headers['authorization'])) {
            $jwt = explode(' ', $headers['authorization'][0])[1];
            $jwtDecode = JWT::decode($jwt, getenv('SECRET_JWT'), ["HS256", "HS512", "HS384"]);

            $merchantService = $this->container->get(MerchantService::class);

            if (!$merchantService->find($jwtDecode->user->merchant)) {
                $response = new Response();
                $response->getBody()->write('Merchant Invalid');
                return $response->withStatus(ResponseCode::HTTP_BAD_REQUEST);
            }
        }

        return $handler->handle($request);
    }
}
