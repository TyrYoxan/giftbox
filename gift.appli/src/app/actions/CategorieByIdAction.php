<?php

namespace gift\appli\app\actions;

use gift\appli\models\Categorie;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpNotFoundException;
use Slim\Views\Twig;

class CategorieByIdAction
{
    function __invoke(Request $request, Response $response, array $args): Response {
        $response = $response->withStatus(200);
        try {
            $categorie = new Categorie();
            $category = $categorie::where('id', '=', $args['id'])->firstOrFail();
            $presta = $category->prestations;


            $view = Twig::fromRequest($request);
            return $view->render($response, 'CategorieIdView.twig', ['categorie' => $category, 'prestations' => $presta]);
        }catch (\Exception $e){
            throw new HttpNotFoundException($request, $e->getMessage());
        }
    }
}