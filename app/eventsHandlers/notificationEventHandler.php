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
    public function whenCreateNewUserEvent(CreateNewUserEvent $event)
    {
        FlashFacade::notice('增加了一个用户：'.$event->user->name);
    }
    public function whenEditUserEvent(EditUserEvent $event)
    {
        FlashFacade::notice('更新了一个用户：'.$event->user->name);
    }
    public function whenDeleteUserEvent(DeleteUserEvent $event)
    {
        FlashFacade::notice('删除了一个用户：'.$event->user->name);
    }
    public function whenInfoHasBeenEditedByUser(InfoHasBeenEditedByUser $event)
    {
        FlashFacade::notice('用户信息刚刚更新'.$event->data['name']);
    }




}