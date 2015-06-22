<?php
class c_search extends Controller{
    public function _index()
    {
        $this->meta['title'] = SEARCH;

        global $model;
        LoadModel('admin', 'v_users');
        LoadModel('account','department');
        $this->data['users'] = $model->getByParam(
            new v_users(),
            array(
                'group_id' => 2
            )
        );

        $this->data['departments'] = $model->getAll(
            new department()
        );


    }

    public function _search()
    {
        $this->template = false;
        $this->data = 'Hello';

        LoadView('search', 'search', $this->data);
    }
}