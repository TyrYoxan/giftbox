<?php
declare(strict_types=1);

return function( \Slim\App $app): \Slim\App {
    /* home */
    $app->get('/categories[/]', gift\appli\app\actions\CategorieAction::class)->setName('categories');

    $app->get('/categories/{id}', gift\appli\app\actions\CategorieByIdAction::class)->setName('categoriesById');

    $app->get('/prestation', \gift\appli\app\actions\PrestationAction::class)->setName('prestation');

    $app->get('/box/create', \gift\appli\app\actions\CreateBoxAction::class)->setName('createBox');

    $app->post('/box/create', \gift\appli\app\actions\AfficheBoxCreateAction::class)->setName('printBox');

    return $app;

};