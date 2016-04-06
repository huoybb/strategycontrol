<?php

/**
 * Created by PhpStorm.
 * 新增一个用户，或者编辑一个用户是用来检查邮件是否存在;用户名是否有等检查，其实可以将rules的一些特性包含进来的
 * User: ThinkPad
 * Date: 2016/4/5
 * Time: 21:25
 */
class changeNewUserFilter extends myValidation
{
    public function isValid($data)
    {
        if(!RequestFacade::isPost()) return true;
        if($data['name'] == null) return false;
        $email = $data['email'];
        if($email == null){
            FlashFacade::error('邮件地址必须填写');
            return false;
        }
        $user_id = RouterFacade::getParams()['user'];
        return !$this->isEmailExist($email,$user_id);
    }

    private function isEmailExist($email,$user_id=null)
    {
        $user = User::findFirst(['email = :email:','bind'=>['email'=>$email]]);
        if($user) {
            if($user->id == $user_id) return false;
            FlashFacade::error('邮件地址已经注册了，请选择不同的email地址！');
            return true;
        }
        return false;
    }
}