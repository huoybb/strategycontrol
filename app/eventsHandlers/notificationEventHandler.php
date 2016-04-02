<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/1
 * Time: 16:53
 */
class notificationEventHandler
{
    public function whenaddNewsEvent(addNewsEvent $event)
    {
        FlashFacade::notice('a news was added'.$event->new->title);
    }
    public function wheneditNewsEvent(editNewsEvent $event)
    {
        FlashFacade::notice("news:{$event->news->id}:{$event->news->title},has just been edited!");
    }


}