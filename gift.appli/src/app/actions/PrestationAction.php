<?php

namespace gift\appli\app\actions;

use gift\appli\models\Prestation;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class PrestationAction
{
    function __invoke(Request $request, Response $response, array $args): Response {
        $response = $response->withStatus(200);
        $req = $request->getQueryParams()['id']?? null;
        if($req == null){
            throw new HttpBadRequestException($request, "id prestation manquant");
        }
        try{
            $prestation = new Prestation();
            $prest = $prestation::where('id', '=', $req)->firstOrFail();
            $html = <<<HTML
                <html lang="fr">
                <body><h1>Prestation {$prest->libelle}</h1></body>
                </html>
            HTML;

            $response->getBody()->write($html);
            return $response;
        }catch (\Exception $e){
            throw new HttpNotFoundException($request, "prestion not found");
        }

    }
}