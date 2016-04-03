<?php
$eventManager = new myEventManager();

$eDomain = ConfigFacade::getService()->application->eventPrefix;

$eventManager->register($eDomain,[
    notificationEventHandler::class,
    authEventHandler::class,
]);

return $eventManager;