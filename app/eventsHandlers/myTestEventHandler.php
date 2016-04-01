<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/3/31
 * Time: 9:34
 */
class myTestEventHandler
{
    public function myTestEvent(myTestEvent $event)
    {
        var_dump($event->getData());
    }


}