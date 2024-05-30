<?php
declare(strict_types=1);

return function( \Slim\App $app): \Slim\App {
    /* home */
    $app->get('/categories[/]', gift\appli\app\actions\CategorieAction::class)->setName('categories');

    $app->get('/categories/{id}', gift\appli\app\actions\CategorieByIdAction::class)->setName('categoriesById');

    $app->get('/prestation', \gift\appli\app\actions\PrestationAction::class)->setName('prestation');

    $app->get('/box/create', \gift\appli\app\actions\CreateBoxAction::class)->setName('createBox');

    $app->post('/box/create', \gift\appli\app\actions\AfficheBoxCreateAction::class)->setName('printBox');

    $app->get('/signin', \gift\appli\app\actions\Signin::class)->setName('signin');

    $app->get('/signup', \gift\appli\app\actions\SignUp::class)->setName('signup');

    return $app;

};