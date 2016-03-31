<?php

class NewsController extends myController
{

    public function indexAction()
    {
        $news = News::find(['order'=>'created_at DESC']);

        $this->view->news = $news;
    }
    public function showAction(News $news)
    {
        $this->view->news = $news;
    }

    public function editAction(News $news)
    {
        dd($news);
    }
    public function deleteAction(News $news)
    {
        dd($news);
    }



}

