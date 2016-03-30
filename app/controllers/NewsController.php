<?php

class NewsController extends myController
{

    public function indexAction()
    {

    }
    public function showAction(News $news)
    {
        $this->view->news = $news;
    }

}

