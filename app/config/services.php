<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */

use Phalcon\Crypt;
use Phalcon\Di\FactoryDefault;
use Phalcon\Http\Response\Cookies;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Security;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as Flash;

if(!function_exists('dd')){
    function dd($x){
        var_dump($x);die();
    }
}

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($config) {

    $view = new View();
    // Disable several levels，取消三级的模板渲染机制，这个将来也是可以利用一下的。
    $view->disableLevel(array(
        View::LEVEL_LAYOUT      => true,
        View::LEVEL_MAIN_LAYOUT => true
    ));

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            return include 'volt.php';
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
});
$di->setShared('dispatcher',function(){
    return include "dispatcher.php";
});
/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () use ($config) {
    $dbConfig = $config->database->toArray();
    $adapter = $dbConfig['adapter'];
    unset($dbConfig['adapter']);

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;

    return new $class($dbConfig);
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

$di->setShared('router',function(){
    return include "routes.php";
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash(array(
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ));
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/*
 * 设置security，这个可以用来加密密码以及产生token
 */
$di->setShared('security', function () {

    $security = new Security();

// Set the password hashing factor to 12 rounds
    $security->setWorkFactor(12);

    return $security;
});

/*
 * 设置 cookies
 */
$di->setShared('cookies', function() {
    $cookies = new Cookies();
    $cookies->useEncryption(false);
    return $cookies;
});
//
$di->setShared('crypt', function() use($di) {
    $crypt = new Crypt();
    //这里需要设置16位密码，或者24位、32位
    $crypt->setKey('myCryptKey024025');
    return $crypt;
});

$di->setShared('myTools',function(){
    return new myTools();
});

$di->setShared('config',$config);

$di->setShared("carbon",function(){
    return new \Carbon\Carbon();
});

$di->setShared('redis',function(){
    return new myRedis();
});

$di->setShared('eventsManager',function(){
    return include 'events.php';
});
