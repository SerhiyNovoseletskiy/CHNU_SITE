<?php
class c_module_manager extends  Controller {
    function _index() {
        $this->view = 'module_manager';
        $this->meta['title'] = MODULE_MANAGER;
        LoadModel('admin','modules');
        global $model;
        $this->data = $model->getAll(new modules(),'module_id','DESC');

        LoadModel('admin','menu');
        $ms = new menu();
        $ms->tag = 'a';
        $ms->href = '/admin/module_manager/install';
        $ms->value = '<span class="glyphicon glyphicon-download"></span>';
        $ms->class = 'btn';
        $ms->title = INSTALL;

        $this->menu = array($ms);
    }
}