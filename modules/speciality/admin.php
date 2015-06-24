<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 24.06.2015
 * Time: 16:13
 */
class admin_speciality extends Controller{
    function _index(){
        global $model;
        LoadModel('account', 'speciality');
        LoadModel('admin', 'menu');
        $this->view = 'index';
        $this->meta['title'] = 'Спеціальності';
        $this->data = $model->getAll(new speciality());

        $menu = new menu();
        $menu->tag = 'a';
        $menu->href = MODULE_URL . '/add';
        $menu->value = '<span class="glyphicon glyphicon-plus"></span>';
        $menu->class = 'btn btn-success';

        $this->menu = array($menu);
    }
    function _add(){
        $this->meta['title'] = 'Нова спеціальність';
        $this->view = 'add';

        LoadModel('admin', 'menu');
        $menu = new menu();
        $menu->tag = 'a';
        $menu->href = MODULE_URL;
        $menu->value = '<span class="glyphicon glyphicon-arrow-left"></span>';
        $menu->class = 'btn btn-danger';

        $this->menu = array($menu);
    }
    function _save(){
        $this->template = false;
        global $model;
        LoadModel('account', 'speciality');

        $spe = new speciality();
        $spe->name = $_POST['name'];
        $spe->department_id = $_POST['department_id'];
        $model->save($spe);

        header("Location: " . MODULE_URL);
    }
    function _edit(){
        global $model;
        LoadModel('account', 'speciality');
        $this->data['speciality'] = $model->getById(new speciality(), $this->url[5]);
        $this->meta['title'] = $this->data['speciality']->name;

        LoadModel('account', 'department');
        $this->data['department'] = $model->getAll(new department());


        $this->view = 'edit';

        LoadModel('admin', 'menu');
        $menu = new menu();
        $menu->tag = 'a';
        $menu->href = MODULE_URL;
        $menu->value = '<span class="glyphicon glyphicon-arrow-left"></span>';
        $menu->class = 'btn btn-danger';

        $this->menu = array($menu);
    }
    function _update(){
        $this->template = false;
        global $model;
        LoadModel('account', 'speciality');

        $this->data = $model->getById(new speciality(), $this->url[5]);

        $this->data->name = $_POST['name'];
        $model->update($this->data);
        header("Location: " . MODULE_URL . '/edit' . $this->data->_id);
    }
    function _delete(){
        $this->template = false;
        global $model;
        LoadModel('account', 'speciality');

        $model->delete($model->getById(new speciality(), $this->url[5]));
        header("Location: " . MODULE_URL);
    }
}
