<?php
class c_search extends Controller{
    public function _index()
    {
        $this->meta['title'] = SEARCH;

    }

    public function _search()
    {
        $this->template = false;
        $this->data = 'Hello';
        LoadView('search', 'search', $this->data);
    }
}