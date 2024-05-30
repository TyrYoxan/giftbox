<?php

namespace gift\appli\app\actions;

use gift\appli\core\services\catalogue\CatalogueInterface;
use gift\appli\core\services\catalogue\CatalogueService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpNotFoundException;
use Slim\Views\Twig;

class CategorieAction{

    private CatalogueInterface $catalogueService;

    public function __construct(){
        $this->catalogueService = new CatalogueService();
    }

    function __invoke(Request $request, Response $response, array $args): Response{

        try {
            $category = $this->catalogueService->getCategories();
        }catch(\Exception $e){
            throw new HttpNotFoundException($request, $e->getMessage());
        }

        $view = Twig::fromRequest($request);
        return $view->render($response, 'CategoriesView.twig',['categorie'=>$category]);
    }
}