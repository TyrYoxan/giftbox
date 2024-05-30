<?php

namespace gift\appli\app\actions;

use gift\appli\core\domaine\entities\Prestation;
use gift\appli\core\services\catalogue\CatalogueInterface;
use gift\appli\core\services\catalogue\CatalogueService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;
use Slim\Views\Twig;

class PrestationAction{
    private CatalogueInterface $catalogueService;

    public function __construct(){
        $this->catalogueService = new CatalogueService();
    }
    function __invoke(Request $request, Response $response, array $args): Response {
        $req = $request->getQueryParams()['id']?? null;
        if($req == null){
            throw new HttpBadRequestException($request, "id prestation manquant");
        }
        try{
            $cat = $this->catalogueService->getPrestationById($req);
            $view = Twig::fromRequest($request);
            return $view->render($response, "PrestationView.twig", $cat);
        }catch (\Exception $e){
            throw new HttpNotFoundException($request, $e->getMessage());
        }

    }
}