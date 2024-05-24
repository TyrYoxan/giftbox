<?php

namespace gift\appli\app\actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class AfficheBoxCreateAction
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $parsedBody = $request->getParsedBody();

        $libelle = htmlspecialchars($parsedBody['libelle'] ?? '', ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($parsedBody['description'] ?? '', ENT_QUOTES, 'UTF-8');
        $montant = htmlspecialchars($parsedBody['montant'] ?? '', ENT_QUOTES, 'UTF-8');
        $kdo = htmlspecialchars($parsedBody['kdo'] ?? '0', ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($parsedBody['message'] ?? '', ENT_QUOTES, 'UTF-8');

        $response->withStatus(200);

        $view = Twig::fromRequest($request);
        return $view->render($response, 'BoxView.twig', ['libelle' => $libelle, 'description' => $description, 'montant' => $montant, 'kdo' => $kdo, 'message' => $message]);
    }
}
