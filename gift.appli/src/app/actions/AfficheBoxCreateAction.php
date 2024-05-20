<?php

namespace gift\appli\app\actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

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

        $html = <<<HTML
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Box Créée</title>
        </head>
        <body>
            <h1>Box Créée</h1>
            <div>
                <p><strong>Libellé :</strong> $libelle</p>
                <p><strong>Description :</strong> $description</p>
                <p><strong>Montant :</strong> $montant</p>
                <p><strong>Kdo :</strong> $kdo</p>
HTML;

        if ($kdo == '1') {
            $html .= <<<HTML
                <p><strong>Message :</strong> $message</p>
HTML;
        }

        $html .= <<<HTML
            </div>
        </body>
        </html>
HTML;

        $response->getBody()->write($html);
        return $response;
    }
}
