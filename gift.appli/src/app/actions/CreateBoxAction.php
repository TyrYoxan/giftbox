<?php

namespace gift\appli\app\actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CreateBoxAction{

    function __invoke(Request $request, Response $response, array $args): Response{
        $response = $response->withStatus(200);

        $html = <<<HTML
                <html lang="fr">
                <body>
                <h1>Créer une Box</h1>
                    <form method="post" id="boxForm">
                        <div>
                            <label for="libelle">Libellé:</label>
                            <input type="text" id="libelle" name="libelle" required>
                        </div>
                        <div>
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" required></textarea>
                        </div>
                        <div>
                            <label for="montant">Montant:</label>
                            <input type="number" id="montant" name="montant" required>
                        </div>
                        <div>
                            <label for="kdo">Kdo:</label>
                            <select id="kdo" name="kdo" required>
                                <option value="0">Non</option>
                                <option value="1">Oui</option>
                            </select>
                        </div>
                        <div id="messageContainer" class="hidden">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message"></textarea>
                        </div>
                        <div>
                            <button type="submit">Créer la Box</button>
                        </div>
                    </form>
                </body>
                </html>

HTML;
        $response->getBody()->write($html);
        return $response;
    }
}