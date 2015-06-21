<?php

class User
{
    public $user;
    public $user_group;
    private $aut = false;
    private $root = false;
    private $su = false;

    function __construct()
    {
        global $model;
        session_start();
        LoadModel('admin', 'user');

        if (isset($_SESSION['user_id']) and isset($_SESSION['user_pass'])) {
            $this->user = $model->getById(new users(), $_SESSION['user_id']);

            if ($this->user->pass == $_SESSION['user_pass']) {
                $this->user_group = $model->getById(new user_groups(), $this->user->group_id);
                $this->aut = true;
                $this->root = $this->user_group->root == 1;
                $this->su = $this->user_group->su == 1;
            }
        }
    }

    function isAuth()
    {
        return $this->aut;
    }

    function isRoot()
    {
        return $this->root;
    }

    function isSU() {
        return $this->su;
    }

    function Auth($login, $pass)
    {
        if ($login !== '') {
            $pass = md5($pass);

            global $model;

            $this->user = $model->getRowByParam(new users(), array('login' => $login, 'pass' => $pass));

            if (!empty($this->user->group_id)) {


                $this->user_group = $model->getById(new user_groups(), $this->user->group_id);
                $this->root = ($this->user_group->root == '1');
                $this->su = ($this->user_group->su == '1');
                $this->aut = true;

                LoadModel('admin','sign_in_log');
                $log = new sign_in_log();
                $log->date = time();
                $log->IP = $_SERVER[REMOTE_ADDR];
                $log->login = $login;
                $model->save($log);
            }


        }
    }

    function signOut()
    {
        session_destroy();
    }
}