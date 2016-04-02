<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/1
 * Time: 16:53
 */
class notificationEventHandler
{
    public function whenAddNewsEvent(AddNewsEvent $event)
    {
        FlashFacade::notice('a news was added'.$event->new->title);
    }
    public function whenEditNewsEvent(EditNewsEvent $event)
    {
        FlashFacade::notice("news:{$event->news->id}:{$event->news->title},has just been edited!");
    }
    public function whenDeleteNewsEvent(DeleteNewsEvent $event)
    {
        FlashFacade::notice("news:{$event->news['id']}:{$event->news['title']},has just been deleted");
    }

}