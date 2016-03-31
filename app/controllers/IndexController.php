<?php

class IndexController extends myController
{

    public function indexAction()
    {
        $news = News::find(['order'=>'created_at DESC','limit'=>3]);

        $this->view->news = $news;


        EventFacade::trigger(new myTestEvent('test'));

    }

}

