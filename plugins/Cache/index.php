<?php
class Cache {
    private $no_cache = array(
        array(
            'controller' => 'admin'
        ),
        array(
            'controller' => 'ecommerce',
            'actions' => array(
                'addtocart',
                'shopcart',
                'order'
            )
        ),
        array(
            'controller' => 'sitemap'
        ),
        array(
            'controller' => 'shop'
        ), array(
            'controller' => 'contactform'
        )
    );

    private $cache_file;
    private $dir = 'cache';
    private $make_cache = true;
    private $is_active = true;
    private $url;

    function __construct() {
        if ($this->is_active)
            $this->init();
    }

    private function init() {
        $this->cache_file = str_replace('/','-',substr($_SERVER['REQUEST_URI'], 1, strlen($_SERVER['REQUEST_URI']))).'.html';
        if ($_SERVER['REQUEST_URI'] == '/')
            $this->cache_file = 'index.html';

        $this->url = explode('/', $_SERVER['REQUEST_URI']);

        foreach($this->no_cache as $no_cache) {
            if ($no_cache['controller'] == $this->url[1] and empty($no_cache['actions'])) {
                $this->make_cache = false;
                break;
            }
            elseif ($no_cache['controller'] == $this->url[1] and !empty($no_cache['actions'])) {
                foreach($no_cache['actions'] as $action) {
                    if ($action == $this->url[2]) {
                        $this->make_cache = false;
                        break;
                    }
                }
            }
        }
    }

    public function  is_active() {
        return $this->make_cache;
    }
}