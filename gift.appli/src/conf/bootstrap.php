<?php

use Slim\Factory\AppFactory;
//use Slim\Views\Twig;


/* application boostrap */
gift\appli\utils\Eloquent::init('../src/conf/gift.db.conf.ini.dist');

$app = AppFactory::create();
//$app->setBasePath('/gift/gift.appli/public');
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, false, false);

$twig = \Slim\Views\Twig::create(__DIR__ . '/../app/views', ['cache' => __DIR__ . '/../app/views/cache', 'auto_reload' => true]);

$app->add(\Slim\Views\TwigMiddleware::create($app, $twig));

$app=(require_once 'routes.php')($app);

return $app;