<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/2
 * Time: 10:42
 */
class editNewsEvent
{
    public $news;

    /**
     * editNewsEvent constructor.
     * @param $news
     */
    public function __construct($news)
    {
        $this->news = $news;
    }

}