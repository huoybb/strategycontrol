<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/3
 * Time: 13:16
 */
class LogoutEvent
{
    public $user;

    /**
     * LogoutEvent constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

}