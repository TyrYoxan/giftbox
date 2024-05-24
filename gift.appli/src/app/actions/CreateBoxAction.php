<?php

namespace gift\appli\app\actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class CreateBoxAction{

    function __invoke(Request $request, Response $response, array $args): Response{
        $response = $response->withStatus(200);


        $view = Twig::fromRequest($request);
        return $view->render($response, "CreatBoxView.twig");
    }
}