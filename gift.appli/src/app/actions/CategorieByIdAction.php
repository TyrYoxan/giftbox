<?php

namespace gift\appli\app\actions;

use gift\appli\models\Categorie;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CategorieByIdAction
{
    function __invoke(Request $request, Response $response, array $args): Response {
        $response = $response->withStatus(200);

        $categorie = new Categorie();
        $category = $categorie::where('id', '=', $args['id'])->first();
        $html = <<<HTML
                    <html lang="fr">
                    <body>
                        <h1>{$category->libelle}</h1>
                    </body>
                    </html>
                    HTML;

        $response->getBody()->write($html);
        return $response;
    }
}