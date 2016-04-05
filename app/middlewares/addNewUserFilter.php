<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/5
 * Time: 21:25
 */
class addNewUserFilter extends myValidation
{
    public function isValid($data)
    {
        if(!RequestFacade::isPost()) return true;
        $email = $data['email'];
        if($email == null){
            FlashFacade::error('邮件地址必须填写');
            return false;
        }
        $user = User::findFirst(['email = :email:','bind'=>['email'=>$email]]);
        if($user) {
            FlashFacade::error('邮件地址已经注册了，请选择不同的email地址！');
            return false;
        }
        return true;
    }
}