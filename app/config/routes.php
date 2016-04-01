<?php
use Phalcon\Mvc\Router;

$router = new myRouter(false);

//$router->bindProvider(FilesInterface::class,Files::class);


$router->removeExtraSlashes(true);
//$router->addMiddlewaresForEveryRoute([isLoggedin::class]);

$router->add('/','index::index')->setName('home');

$router->add('/news','news::index')->setName('news.index');
$router->add('/news/{page:[0-9]+}','news::index')->setName('news.index.page');
$router->addx('/news/add','news::add',[newsRules::class])->setName('news.add');
$router->add('/news/{news:[0-9]+}','news::show')->setName('news.show');
$router->addx('/news/{news:[0-9]+}/edit','news::edit',[newsRules::class])->setName('news.edit');
$router->add('/news/{news:[0-9]+}/delete','news::delete')->setName('news.delete');

return $router;