<?php

namespace gift\appli\app\actions;

use gift\appli\models\Categorie;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CategorieAction{


    function __invoke(Request $request, Response $response, array $args): Response
    {

        $response = $response->withStatus(200);
        $categories = new Categorie();
        $category = $categories->all();
        $html = <<<HTML
<html lang="fr">
    <body>
        <h1>Categories</h1>
        <ul>
HTML;

// Ajouter les catégories dynamiquement
        foreach ($category as $cat) {
            $html .= "<li><a href='categories/{$cat->id}'>{$cat->libelle}</a> | {$cat->description}</li>";
        }

        $html .= <<<HTML
        </ul>
    </body> 
</html>
HTML;

        $response->getBody()->write($html);
        return $response;
    }
}