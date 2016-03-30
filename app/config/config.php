<?php

defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'strategycontrol',
        'charset'     => 'utf8',
    ),
    'siteName' =>'市场导向的战略管控平台',
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'migrationsDir'  => APP_PATH . '/app/migrations/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'libraryDir'     => APP_PATH . '/app/library/',
        'cacheDir'       => APP_PATH . '/app/cache/',
        'baseUri'        => '/',
        'middlewaresDir' => __DIR__ . '/../../app/middlewares/',
        'facades'         => __DIR__ . '/../../app/facades/',
        'eventPrefix'    => 'my',
        'events'    => APP_PATH . '/app/events/',
        'eventsHandlers'    => APP_PATH . '/app/eventsHandlers/',
    )
));
