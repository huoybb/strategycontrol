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
    public function addAction(News $news)
    {
        if($this->request->isPost()){
            $data = $this->request->getPost();
            $news->save($data);
            $this->redirectByRoute(['for'=>'news.show','news'=>$news->id]);
        }

        $this->view->form = myForm::buildFromModel($news);

    }


    public function editAction(News $news)
    {
        if($this->request->isPost()){
            $data = $this->request->getPost();
            $news->update($data);
            $this->redirectByRoute(['for'=>'news.show','news'=>$news->id]);
        }

        $this->view->news = $news;
        $this->view->form = myForm::buildFromModel($news);
    }
    public function deleteAction(News $news)
    {
        $news->delete();
        return $this->redirectByRoute(['for'=>'news.index']);
    }
    



}

