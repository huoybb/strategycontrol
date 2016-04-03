<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/3
 * Time: 13:05
 */
class LoginEvent
{
    public $user;
    public $data;

    /**
     * LoginEvent constructor.
     * @param $user
     * @param $data
     */
    public function __construct(User $user, $data)
    {
        $this->user = $user;
        $this->data = $data;
    }

}