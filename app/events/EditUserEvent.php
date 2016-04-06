<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/7
 * Time: 7:21
 */
class EditUserEvent
{
    public $user;

    /**
     * EditUserEvent constructor.
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

}