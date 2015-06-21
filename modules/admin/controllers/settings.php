<?php
class c_settings extends Controller{
    function _index() {
        $this->meta['title'] = SETTINGS;
        $this->view = 'settings';
    }
}