<?php

namespace gift\appli\app\actions;

use gift\appli\models\Prestation;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;
use Slim\Psr7\Stream;
use Slim\Views\Twig;
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
            //$f = new Stream( fopen('../../img/'.$prest->img, 'r') );
            //$response->withHeader('Content-Type', 'image/jpg')
            //        ->withBody($f);

            $view = Twig::fromRequest($request);
            return $view->render($response, "PrestationView.twig", ['presta' => $prest]);
        }catch (\Exception $e){
            throw new HttpNotFoundException($request, $e->getMessage());
        }

    }
}