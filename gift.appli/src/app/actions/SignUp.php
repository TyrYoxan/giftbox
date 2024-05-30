<?php
namespace gift\appli\app\actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;
use Slim\Views\Twig;

class SignUp
{
    function __invoke(Request $request, Response $response, array $args): Response {
        $response = $response->withStatus(200);

        try{
            $view = Twig::fromRequest($request);
            return $view->render($response, "SignUpView.twig");
        }catch (\Exception $e){
            throw new HttpNotFoundException($request, $e->getMessage());
        }

    }
}