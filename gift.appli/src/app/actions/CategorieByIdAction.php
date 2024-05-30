<?php

namespace gift\appli\app\actions;

use gift\appli\core\domaine\entities\Categorie;
use gift\appli\core\services\catalogue\CatalogueInterface;
use gift\appli\core\services\catalogue\CatalogueService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpNotFoundException;
use Slim\Views\Twig;

class CategorieByIdAction{
    private CatalogueInterface $catalogueService;

    public function __construct(){
        $this->catalogueService = new CatalogueService();
    }

    function __invoke(Request $request, Response $response, array $args): Response {
        try {
            $cat = $this->catalogueService->getCategoriesById($args['id']);

            $view = Twig::fromRequest($request);
            return $view->render($response, 'CategorieIdView.twig', $cat );
        }catch (\Exception $e){
            throw new HttpNotFoundException($request, $e->getMessage());
        }
    }
}