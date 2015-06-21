<?php
class c_user extends Controller {
    function _new() {
        $this->meta['title'] = NEW_USER;
        $this->view = 'new.user';
        LoadModel('admin','user');
        global $model;
        $this->data = $model->getAll(new user_groups());

        LoadModel('admin','menu');
        $ms = new menu();
        $ms->tag = 'button';
        $ms->form = 'user';
        $ms->value = SAVE;
        $ms->class = 'btn btn-primary';

        $this->menu = array($ms);
    }

    function _edit() {
        $this->view = 'edit.user';
        LoadModel('admin','user');
        global $model;
        $this->data['user'] = $model->getById(new users(),$this->url[4]);
        $this->data['groups'] = $model->getAll(new user_groups());
        $this->meta['title'] = $this->data['user']->login;

        LoadModel('admin','menu');
        $ms = new menu();
        $ms->tag = 'button';
        $ms->form = 'user';
        $ms->value = SAVE;
        $ms->class = 'btn btn-primary';

        $this->menu = array($ms);
    }

    function _save() {
        $this->template = false;
        global $model;
        LoadModel('admin','user');

        $user = new users();
        $user->login = $_POST['login'];
        $user->pass = md5($_POST['password']);
        $user->group_id = $_POST['user_group'];

        $model->save($user);
        header('Location: /admin/users');
    }

    function _update() {
        $this->template = false;
        global $model;
        LoadModel('admin','user');

        $user = $model->getById(new users(), $_POST['user_id']);

        $user->login = $_POST['login'];

        if ($_POST['password'] !== '') {
            $user->pass = md5($_POST['password']);
        }

        $user->group_id = $_POST['group_id'];

        $model->update($user);

        header('Location: /admin/user/edit/'.$_POST['user_id']);
    }
}