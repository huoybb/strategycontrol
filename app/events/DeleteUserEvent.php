<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/8
 * Time: 21:34
 */
class DeleteUserEvent
{
    public $user;

    /**
     * DeleteUserEvent constructor.
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

}