<?php

error_reporting(E_ALL);

define('APP_PATH', realpath('..'));

try {

    /*
     *加载composer
     */
    require '../vendor/autoload.php';
    /**
     * Read the configuration
     */
    $config = include APP_PATH . "/app/config/config.php";

    /**
     * Read auto-loader
     */
    include APP_PATH . "/app/config/loader.php";

    /**
     * Read services
     */
    include APP_PATH . "/app/config/services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    /**
      * 设置phalcon debugbar，需要下面两行
      *
      */
    $di['app'] = $application;
    (new Snowair\Debugbar\ServiceProvider('../app/config/debugbar.php'))->start();

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
