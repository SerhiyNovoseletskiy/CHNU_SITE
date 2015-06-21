<?php

class c_users extends Controller
{
    function _index()
    {
        $this->meta['title'] = USERS;
        $this->view = 'users';
        global $model;
        LoadModel('admin', 'user');

        $this->data = $model->getAll(new users());

        LoadModel('admin', 'menu');

        $this->menu = array();

        $this->mn = new menu();

        $this->mn->tag = 'a';
        $this->mn->class = 'btn btn-warning';
        $this->mn->href = '/admin/user/new';
        $this->mn->value = NEW_USER;

        array_push($this->menu, $this->mn);
    }
}