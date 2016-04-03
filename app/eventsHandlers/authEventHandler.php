<?php
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/4/3
 * Time: 13:07
 */
class authEventHandler
{
    public function whenLoginEvent(LoginEvent $event)
    {
        $user = $event->user;
        $data = $event->data;
        $remember = isset($data['remember'])?$data['remember']:'off';
        SessionFacade::set('auth',['id'=>$user->id,'name'=>$user->name]);
        if($remember == 'on'){
            $token = SecurityFacade::getToken();
            $user->save(['remember_token'=>$token]);
            CookieFacade::set('auth',['email'=>$user->email,'token'=>$token],Carbon::now()->addDay(15)->timestamp);//@todo 确认时间这么设置是否正确
        }
    }

    public function whenLogoutEvent(LogoutEvent $event)
    {
        $event->user->save(['remember_token'=>SecurityFacade::getToken()]);//避免cookie的盗用
        SessionFacade::remove('auth');
        CookieFacade::remove('auth');
    }

}