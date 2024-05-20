<?php

namespace gift\appli\app\actions;

use gift\appli\models\Prestation;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class PrestationAction
{
    function __invoke(Request $request, Response $response, array $args): Response {
        $response = $response->withStatus(200);
        $request = $request->getQueryParams()['id']?? null;
        $prestation = new Prestation();
        $prest = $prestation::where('id', '=', $request)->firstOrFail();
        $html = <<<HTML
                <html lang="fr">
                <body><h1>Prestation {$prest->libelle}</h1></body>
                </html>
            HTML;

        $response->getBody()->write($html);
        return $response;
    }
}