<?php
declare(strict_types=1);

return function( \Slim\App $app): \Slim\App {
    /* home */
    $app->get('/categories[/]', gift\appli\app\actions\CategorieAction::class);

    $app->get('/categories/{id}', gift\appli\app\actions\CategorieByIdAction::class);

    $app->get('/prestation', \gift\appli\app\actions\PrestationAction::class);

    $app->get('/box/create', \gift\appli\app\actions\CreateBoxAction::class);

    $app->post('/box/create', \gift\appli\app\actions\AfficheBoxCreateAction::class);

    return $app;

};