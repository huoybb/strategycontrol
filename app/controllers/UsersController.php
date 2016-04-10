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
            if(User::login($data['email'],$data['password'],$data['remember'])){
                return $this->redirectByRoute(['for'=>'home']);
            }
        }
        $this->view->form = myForm::buildLoginForm();
    }
    public function logoutAction()
    {
        User::logout();
        $this->redirectByRoute(['for'=>'login']);
    }

    public function addAction(User $user)
    {
        if($this->request->isPost()){
            $user->addNewUser($this->request->getPost());
            return $this->redirectByRoute(['for'=>'users.index']);
        }
        $user->filledWithLastPost();
        $this->view->form = myForm::buildFromModel($user);
    }

    public function editAction(User $user)
    {
        if($this->request->isPost()){
            $user->editUser($this->request->getPost());
            return $this->redirectByRoute(['for'=>'users.index']);
        }
        $user->filledWithLastPost();
        $this->view->form = myForm::buildFromModel($user);

    }

    public function deleteAction(User $user)
    {
        User::deleteUser($user);
        return $this->redirectByRoute(['for'=>'users.index']);
    }

    public function showMyInfoAction()
    {
        /** @var User $user */
//        $user = AuthFacade::getService();
//        dd($user->getDataTypes());
        $this->view->user = AuthFacade::getService();
    }
    public function editMyInfoAction()
    {
        /** @var User $user */
        $user = AuthFacade::getService();
        if($this->request->isPost()){
            $user->editInfo($this->request->getPost());
            return $this->redirectByRoute(['for'=>'my.showInfo']);
        }
        $user->filledWithLastPost();
        $this->view->form = myForm::buildMyInfoForm($user);
    }







}

