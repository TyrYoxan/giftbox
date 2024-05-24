<?php

namespace gift\appli\app\actions;

use gift\appli\models\Categorie;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class CategorieAction{

    function __invoke(Request $request, Response $response, array $args): Response
    {

        $response = $response->withStatus(200);
        $categories = new Categorie();
        $category = $categories->all();

        $view = Twig::fromRequest($request);
        return $view->render($response, 'CategoriesView.twig',['categorie'=>$category]);
    }
}