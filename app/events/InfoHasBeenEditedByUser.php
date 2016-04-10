<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/10
 * Time: 14:53
 */
class InfoHasBeenEditedByUser
{
    public $data;

    /**
     * InfoHasBeenEditedByUser constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

}