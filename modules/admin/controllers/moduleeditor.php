<?php
class c_moduleeditor extends Controller {
    function __construct() {
        if (!DEBUG) {
            LoadView('admin','404');
            exit();
        }
    }

    function _index() {
        $this->view = 'module.editor.index';
        $this->meta['title'] = MODULE_EDITOR;

        LoadModel('admin','modules');
        global $model;
        $module = $model->getById(new modules(), $this->url[4]);

        $this->data['module_info'] = $module;
        $this->data['files'] = array();

        $dir = opendir('modules/'.$module->alias);

        while ($file = readdir($dir)) {

        }

        closedir($dir);
        $this->template = false;

    }
}