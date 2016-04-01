<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/1
 * Time: 11:10
 */
class newsRules extends myValidationRules
{
    public $rules = [
        'customer_id'=>['validator'=>'PresenceOf','message'=>'请设置客户id'],
        'title'=>['validator'=>'PresenceOf','message'=>'新闻标题不能为空'],
        'content'=>['validator'=>'PresenceOf','message'=>'动态内容不能为空'],
    ];
}