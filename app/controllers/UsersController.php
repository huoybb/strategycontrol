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
            if(User::login($data['email'],$data['password'])){
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
            $data = $this->request->getPost();
            $user->addNewUser($data);
            return $this->redirectByRoute(['for'=>'users.index']);
        }
        $user->filledWithLastPost();
        $this->view->form = myForm::buildFromModel($user);
    }

    public function editAction(User $user)
    {
        if($this->request->isPost()){
            $data = $this->request->getPost();
            $user->editUser($data);
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





}

