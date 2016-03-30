<?php

class IndexController extends myController
{

    public function indexAction()
    {
        $news = News::find();

        $this->view->news = $news;


        EventFacade::trigger(new myTestEvent('test'));

    }

}

