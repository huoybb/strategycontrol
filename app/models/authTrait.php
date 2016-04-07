<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/7
 * Time: 22:36
 */
trait authTrait
{
    public static function login($email, $password)
    {
        $user = static::findFirst(['email = :email:','bind'=>['email'=>$email]]);
        if($user AND SecurityFacade::checkHash($password,$user->password)){
            if($user->status != '正常'){
                FlashFacade::error('你的帐户目前不正常，不能正常登录，请联系系统管理员');
                return false;
            }
            FlashFacade::success('欢迎'.$user->name.'登录！你上次登录的时间是：'.$user->updated_at);
            EventFacade::trigger(new LoginEvent($user,[]));
            return true;
        }
        FlashFacade::error('登录不成功，密码或者邮件地址有误！');
        return false;
    }

    /**
     * @param array $cookie
     * @return User
     */
    public static function loginByCookieAuth(array $cookie){

        /** @var User $user */
        $user = static::query()
            ->where('email = :email:', ['email' => $cookie['email']])
            ->andWhere('remember_token = :token:', ['token' => $cookie['token']])
            ->execute()->getFirst();
        if($user){
            FlashFacade::success('欢迎'.$user->name.'登录！你上次登录的时间是：'.$user->updated_at);
            EventFacade::trigger(new LoginEvent($user,['remember'=>'on']));
            return true;
        }
        return false;
    }

    public static function logout(){
        EventFacade::trigger(new LogoutEvent(AuthFacade::getService()));
    }

    public function addNewUser($data)
    {
        $this->save($data);
        EventFacade::trigger(new CreateNewUserEvent($this));
        return $this;
    }
    public function editUser($data)
    {
        $this->save($data);
        EventFacade::trigger(new EditUserEvent($this));
        return $this;
    }

}