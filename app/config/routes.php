<?php
use Phalcon\Mvc\Router;

$router = new myRouter(false);

//$router->bindProvider(FilesInterface::class,Files::class);


$router->removeExtraSlashes(true);
//$router->addMiddlewaresForEveryRoute([isLoggedin::class]);

$router->add('/','index::index')->setName('home');
$router->add('/news/{news:[0-9]+}','news::show')->setName('news.show');

return $router;