<?

class SiteBulder
{
    private $url;
    private $controller;
    private $action = '_index';

    function __construct()
    {
        $this->Route();
    }

    function __destruct()
    {
        global $sql;
        $sql->close();
    }

    private function Route()
    {
        $_SERVER['REQUEST_URI'] = urldecode($_SERVER['REQUEST_URI']);
        global $routing;
        if (!empty($routing[$_SERVER['REQUEST_URI']]))
            $this->url = $routing[$_SERVER['REQUEST_URI']];
        else
            $this->url = $_SERVER['REQUEST_URI'];

        $this->url = explode('/', $this->url);

        define('MODULE_URL', '/admin/module/' . $this->url[3]);

        $this->controller = $this->url[1];
        if (is_file('modules/' . $this->controller . '/index.php')) {
            require_once 'modules/' . $this->controller . '/index.php';

            $this->controller = 'c_' . $this->controller;

            if (class_exists($this->controller)) {
                LoadLanguage($this->url[1]);

                $this->controller = new $this->controller($this->url);


                if (!empty($this->url[2]))
                    $action = '_' . $this->url[2];
                else
                    $action = $this->action;

                if ($this->controller->actions) {
                    $this->controller->url = $this->url;

                    if (method_exists($this->controller, $action))
                        $this->controller->$action();
                    else
                        $this->controller->_index();

                    if ($this->controller->template) {
                        LoadTemplate($this->url[1], $this->controller->view, $this->controller->data, $this->controller->meta, $this->controller->data1);
                    }
                }

            } else {
                $this->_404();
            }

        } else {
            $this->_404();
        }
    }

    private function _404()
    {
        require_once 'templates/' . TEMPLATE . '/404.html';
    }
}

class Controller
{
    public $meta;
    public $url;
    public $template = true;
    public $view = 'index';
    public $data = null;
    public $data1 = null;
    public $actions = true;

    function _index()
    {

    }
}