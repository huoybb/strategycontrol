<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/5
 * Time: 21:41
 */
class CreateNewUserEvent
{
    public $user;

    /**
     * CreateNewUser constructor.
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

}