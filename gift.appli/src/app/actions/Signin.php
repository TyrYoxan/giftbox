<?php
namespace gift\appli\app\actions;

use gift\appli\models\Prestation;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;
use Slim\Views\Twig;

class Signin
{
    function __invoke(Request $request, Response $response, array $args): Response {
        $response = $response->withStatus(200);

        try{
            $view = Twig::fromRequest($request);
            return $view->render($response, "SigninView.twig");
        }catch (\Exception $e){
            throw new HttpNotFoundException($request, $e->getMessage());
        }

    }
}