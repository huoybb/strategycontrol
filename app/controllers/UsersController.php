<?php

class UsersController extends myController
{

    public function indexAction()
    {
        $users = User::find();
        $this->view->users = $users;
    }
    public function loginAction()
    {
        if($this->request->isPost()){
            $data = $this->request->getPost();
            $user = User::findFirst(['email = :email:','bind'=>['email'=>$data['email']]]);
//            dd($user->toArray());
            if($user AND SecurityFacade::checkHash($data['password'],$user->password)){
                if($user->status != '正常'){
                    FlashFacade::error('你的帐户目前不正常，不能正常登录，请联系系统管理员');
                    return $this->redirectByRoute(['for'=>'login']);
                }
                FlashFacade::success('欢迎'.$user->name.'登录！你上次登录的时间是：'.$user->updated_at);
                EventFacade::trigger(new LoginEvent($user,$data));
                return $this->redirectByRoute(['for'=>'home']);
            }else{
                $this->flash->error('登录不成功，密码或者邮件地址有误！');
            }
        }
        $this->view->form = myForm::buildLoginForm();
    }
    public function logoutAction()
    {
        EventFacade::trigger(new LogoutEvent(AuthFacade::getService()));
        $this->redirectByRoute(['for'=>'login']);
    }

    public function addAction(User $user)
    {
        if($this->request->isPost()){
            $data = $this->request->getPost();
            $user->save($data);
            EventFacade::trigger(new CreateNewUserEvent($user));
            return $this->redirectByRoute(['for'=>'users.index']);
        }
        $user->filledWithLastPost();
        $this->view->form = myForm::buildFromModel($user);
    }



}

