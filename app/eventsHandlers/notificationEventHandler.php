<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/1
 * Time: 16:53
 */
class notificationEventHandler
{
    public function addNewsEvent(addNewsEvent $event)
    {
        FlashFacade::notice('a news was added'.$event->new->title);
    }

}