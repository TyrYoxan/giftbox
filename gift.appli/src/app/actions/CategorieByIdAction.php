<?php

namespace gift\appli\app\actions;

use gift\appli\models\Categorie;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CategorieByIdAction
{
    function __invoke(Request $request, Response $response, array $args): Response {
        $response = $response->withStatus(200);
        try {
            $categorie = new Categorie();
            $category = $categorie::where('id', '=', $args['id'])->firstOrFail();
            $presta = $category->prestations;
            $html = <<<HTML
                    <html lang="fr">
                    <body>
                        <h1>{$category->libelle}</h1>
                    HTML;
            foreach ($presta as $p) {
                $html .= <<<HTML

                    <h2>{$p->libelle}</h2>
                    <p>{$p->description}</p>
                HTML;
            }
            $html .= <<<HTML
                    </body>
                    </html>
                    HTML;

            $response->getBody()->write($html);
            return $response;
        }catch (\Exception $e){
            return $response->withStatus(404);
        }
    }
}