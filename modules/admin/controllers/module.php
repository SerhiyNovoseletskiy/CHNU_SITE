<?php

class c_module extends Controller
{
    private $module;
    private $controller;

    function _index()
    {
        global $model;
        LoadModel('admin', 'modules');
        $this->module = $model->getRowByParam(new modules(), array('alias' => $this->url['3']));

        if (is_file('modules/' . $this->module->alias . '/admin.php')) {
            require_once 'modules/' . $this->module->alias . '/admin.php';

            $this->controller = 'admin_' . $this->url[3];

            if (class_exists($this->controller)) {
                if (is_file('languages/'.DEFAULT_LANGUAGE.'.'.$this->url[3].'.php'))
                    require_once 'languages/'.DEFAULT_LANGUAGE.'.'.$this->url[3].'.php';

                $this->controller = new $this->controller;
                $this->controller->url = $this->url;

                if (empty($this->url[4]))
                    $action = '_index';
                else
                    $action = '_' . $this->url[4];

                if (method_exists($this->controller, $action)) {
                    $this->controller->$action();

                    $this->meta = $this->controller->meta;
                    $this->view = $this->controller->view;
                    $this->data = $this->controller->data;
                    $this->menu = $this->controller->menu;
                    $this->template = $this->controller->template;
                }

            }
        } else {

        }
    }
}