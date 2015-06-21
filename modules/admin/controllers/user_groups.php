<?php
class c_user_groups extends Controller {
    function _index() {
        $this->view = 'user.groups';

        $this->meta['title'] = USER_GROUPS;

        LoadModel('admin','user');
        global $model;
        $this->data = $model->getAll(new user_groups());

        LoadModel('admin','menu');

        $ms = new menu();
        $ms->tag = 'a';
        $ms->href = '/admin/user_groups/add';
        $ms->value = '<span class="glyphicon glyphicon-plus"></span>';
        $ms->class = 'btn btn-warning';

        $this->menu = array($ms);
    }

    function _add() {
        $this->meta['title'] = NEW_USER_GROUP;
        $this->view = 'new.user.group';

        LoadModel('admin','menu');
        $this->menu = array();

        $ms = new menu();
        $ms->tag = 'a';
        $ms->href = '/admin/user_groups';
        $ms->value = '<span class="glyphicon glyphicon-arrow-left"></span>';
        $ms->class = 'btn btn-danger';
        array_push($this->menu, $ms);

        $ms = new menu();
        $ms->tag = 'button';
        $ms->form = 'user_group';
        $ms->value = '<span class="glyphicon glyphicon-save"></span>';
        $ms->class = 'btn btn-primary';
        array_push($this->menu, $ms);

    }

    function _save() {
        $this->template = false;
        global $model;
        LoadModel('admin','user');
        $ug = new user_groups();
        $ug->name = $_POST['user_group'];

        if ($_POST['su'] == 'on')
            $ug->su = 1;

        if ($_POST['root'] == 'on')
            $ug->root = 1;

        $model->save($ug);
        header('Location: /admin/user_groups');
    }
}