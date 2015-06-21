<?php
class c_language extends Controller {
    function _index() {
        $this->template = false;
        setcookie('language',$this->url[2],null,'/');
        if (empty($_SERVER["HTTP_REFERER"]))
            header("Location: /");
        else
            header("Location: {$_SERVER["HTTP_REFERER"]}");
    }
}