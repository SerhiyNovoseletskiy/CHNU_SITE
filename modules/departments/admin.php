<?php
class admin_departments extends Controller {

    function _index() {
        global $model;
        LoadModel('account', 'department');
        LoadModel('admin', 'menu');
        $this->view = 'index';
        $this->meta['title'] = DEPARTMENTS;
        $this->data = $model->getAll(new department());

        $menu = new menu();
        $menu->tag = 'a';
        $menu->href = MODULE_URL . '/add';
        $menu->value = '<span class="glyphicon glyphicon-plus"></span>';
        $menu->class = 'btn btn-success';

        $this->menu = array($menu);
    }

    function _insert() {

    }

    function _create() {
        $this->template = false;
    }

    function _edit() {

    }

    function _update() {
        $this->template = false;
    }

    function _delete() {
        $this->template = false;
    }
}