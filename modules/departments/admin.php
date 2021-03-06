<?php

class admin_departments extends Controller
{

    function _index()
    {
        global $model;
        LoadModel('account', 'department');
        LoadModel('admin', 'menu');
        $this->view = 'index';
        $this->meta['title'] = 'Факультети';
        $this->data = $model->getAll(new department());

        $menu = new menu();
        $menu->tag = 'a';
        $menu->href = MODULE_URL . '/add';
        $menu->value = '<span class="glyphicon glyphicon-plus"></span>';
        $menu->class = 'btn btn-success';

        $this->menu = array($menu);
    }

    function _add()
    {
        $this->meta['title'] = 'Новий факультет';
        $this->view = 'add';

        LoadModel('admin', 'menu');
        $menu = new menu();
        $menu->tag = 'a';
        $menu->href = MODULE_URL;
        $menu->value = '<span class="glyphicon glyphicon-arrow-left"></span>';
        $menu->class = 'btn btn-danger';

        $this->menu = array($menu);
    }

    function _save()
    {
        $this->template = false;
        global $model;
        LoadModel('account', 'department');

        $dep = new department();
        $dep->name = $_POST['name'];
        $model->save($dep);

        header("Location: " . MODULE_URL);
    }

    function _edit()
    {
        global $model;
        LoadModel('account', 'department');

        $this->data = $model->getById(new department(), $this->url[5]);
        $this->meta['title'] = $this->data->name;

        $this->view = 'edit';

        LoadModel('admin', 'menu');
        $menu = new menu();
        $menu->tag = 'a';
        $menu->href = MODULE_URL;
        $menu->value = '<span class="glyphicon glyphicon-arrow-left"></span>';
        $menu->class = 'btn btn-danger';

        $this->menu = array($menu);
    }

    function _update()
    {
        $this->template = false;
        global $model;
        LoadModel('account', 'department');

        $this->data = $model->getById(new department(), $this->url[5]);

        $this->data->name = $_POST['name'];
        $model->update($this->data);
        header("Location: " . MODULE_URL . '/edit/' . $this->data->_id);
    }

    function _delete()
    {
        $this->template = false;

        global $model;
        LoadModel('account', 'department');

        $model->delete($model->getById(new department(), $this->url[5]));
        header("Location: " . MODULE_URL);
    }
}