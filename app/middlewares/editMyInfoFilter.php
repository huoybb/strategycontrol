<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/10
 * Time: 14:16
 */
class editMyInfoFilter extends myValidation
{
    public function isValid($data){

        $emailIsValid = $this->emailIsValid($data['email']);
        $notNull = $this->isNotNull($data);
        return  $emailIsValid && $notNull;
    }

    private function emailIsValid($email)
    {
        if($email == AuthFacade::getService()->email) return true;
        if(User::findFirst(['email = :email:','bind'=>['email'=>$email]])) {
            FlashFacade::error('邮件地址已经存在，不能够修改为此地址');
            return false;
        }
        return true;
    }

    private function isNotNull(array $data)
    {
        $result = true;
        foreach($data as $key=>$value){
            if($value == null){
                FlashFacade::error($key.':不能够为空');
                $result = false;
            }
        }
        return $result;
    }
}