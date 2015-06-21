<?php
class Widget {
    public $data;
    public $view;
}


class c_admin extends Controller
{
    private $user;
    private $module = 'admin';
    private $not_register = array(
        'sign_in'
    );

    function __construct($url)
    {
        $this->template = false;
        $this->url = $url;
        $this->user = LoadPlugin('User');
        $this->actions = false;

        require_once 'languages/'.DEFAULT_LANGUAGE.'.admin.php';

        if (!empty($this->url[2]))
            $action = '_' . $this->url[2];
        else
            $action = '_index';

        if (in_array($this->url[2], $this->not_register)) {
            $this->loadAction();
        } else {
            if ($this->user->isRoot() and $this->user->isAuth()) {
                $this->loadAction();

                $this->data1['menu'] = $this->controller->menu;

                if ($this->url[2] == 'module') {
                    $this->module = $this->url[3];
                }

                $this->data1['user_info'] = $this->user->user;
                $this->data1['module'] = $this->module;

                if ($this->controller->template)
                    LoadView('admin', 'blank', $this->controller, $this->data1);

            } else {
                LoadView('admin', 'login');
            }
        }
    }

    private function loadAction()
    {
        if (empty($this->url[2]))
            $this->url[2] = 'index';

        if (is_file(__DIR__ . '/controllers/' . $this->url[2] . '.php')) {
            require_once __DIR__ . '/controllers/' . $this->url[2] . '.php';

            $this->controller = 'c_' . $this->url[2];

            if (class_exists($this->controller)) {

                $this->controller = new $this->controller;
                $this->controller->url = $this->url;

                if (empty($this->url[3]))
                    $action = '_index';
                else
                    $action = '_' . $this->url[3];

                if (method_exists($this->controller, $action))
                    $this->controller->$action();
                else {
                    $this->controller->_index();
                }

            } else {
                LoadView('admin', '404');
            }
        } else {
            LoadView('admin', '404');
        }
    }
}