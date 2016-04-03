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
            $data['user_id'] = 1;//@todo 使用auth数据来替代
            $news->save($data);
            EventFacade::trigger(new AddNewsEvent($news));
            $this->redirectByRoute(['for'=>'news.show','news'=>$news->id]);
        }
        $news = $this->setLastPost($news);
        $this->view->form = myForm::buildFromModel($news);

    }


    public function editAction(News $news)
    {
        if($this->request->isPost()){
            $data = $this->request->getPost();
            $news->update($data);
            EventFacade::trigger(new EditNewsEvent($news));
            $this->redirectByRoute(['for'=>'news.show','news'=>$news->id]);
        }
        $news = $this->setLastPost($news);
        $this->view->news = $news;
        $this->view->form = myForm::buildFromModel($news);
    }
    public function deleteAction(News $news)
    {
        EventFacade::trigger(new DeleteNewsEvent($news));
        $news->delete();
        return $this->redirectByRoute(['for'=>'news.index']);
    }

    private function setLastPost(myModel $news)
    {
        if(SessionFacade::has('lastPost')){
            $data = SessionFacade::get('lastPost');
            SessionFacade::remove('lastPost');
            foreach($data as $key=>$value){
                if(property_exists($news,$key)) $news->{$key} = $value;
            }
        }
        return $news;
    }

}

