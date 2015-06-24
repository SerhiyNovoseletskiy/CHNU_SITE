<?php
class c_search extends Controller{
    public function _index()
    {
        global $model;
        LoadModel('admin', 'v_users');

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->template = false;


            LoadView('search', 'search', $this->data);
        } else {
            $this->meta['title'] = SEARCH;

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

    }

}