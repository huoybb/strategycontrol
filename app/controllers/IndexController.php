<?php

class IndexController extends myController
{

    public function indexAction()
    {
        $news = News::find(['order'=>'created_at DESC','limit'=>3]);
//        dd(AuthFacade::getService()->toArray());

        $this->view->news = $news;
        
    }

}

