<?php
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2015/8/13
 * Time: 18:59
 *
 */

class isLoggedin extends myValidation{

    public function isValid($data = null)
    {
        if(SessionFacade::has('auth')) return true;
        if(CookieFacade::has('auth')) {
            return User::loginByCookieAuth((array)CookieFacade::get('auth'));
        }
        return false;
    }

    public function initialize()
    {
        $this->redirectUrl = UrlFacade::get(['for'=>'login']);
        $this->excludedRoutes = [
            'login',
            'users.resetPassword',
            'users.userRequestResetPassword'
        ];
    }
} 