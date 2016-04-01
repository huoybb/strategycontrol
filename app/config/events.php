<?php
$eventManager = new myEventManager();

$eDomain = ConfigFacade::getService()->application->eventPrefix;

$eventManager->register($eDomain,[
    myTestEventHandler::class,
    notificationEventHandler::class,
]);

return $eventManager;