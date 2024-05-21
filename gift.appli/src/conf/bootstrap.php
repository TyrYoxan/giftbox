<?php

use Slim\Factory\AppFactory;



/* application boostrap */
gift\appli\utils\Eloquent::init('../src/conf/gift.db.conf.ini.dist');

$app = AppFactory::create();
$app->setBasePath('/gift/gift.appli/public');
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, false, false);


$app=(require_once 'routes.php')($app);

return $app;