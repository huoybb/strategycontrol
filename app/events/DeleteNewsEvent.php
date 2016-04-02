<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/2
 * Time: 12:53
 */
class DeleteNewsEvent
{
    public $news;

    /**
     * DeleteNewsEvent constructor.
     * @param $news
     */
    public function __construct($news)
    {
        $this->news = ['id'=>$news->id,'title'=>$news->title];
    }


}