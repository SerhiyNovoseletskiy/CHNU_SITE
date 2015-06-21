<?php

class c_sign_in extends Controller
{
    function _index()
    {

        $this->user = LoadPlugin('User');
        $this->user->Auth($_POST['login'], $_POST['pass']);

        if ($this->user->isAuth() and $this->user->isRoot()) {
            $_SESSION['user_id'] = $this->user->user->_user_id;
            $_SESSION['user_pass'] = $this->user->user->pass;
        }

        header('Location: /admin');
    }
}