<?php

class c_index extends Controller
{
    function _index()
    {
        $this->meta['title'] = MAIN;
        global $model;
        LoadModel('admin','sign_in_log');
        LoadModel('admin','widgets');
        $this->data['log'] = $model->getAll(new sign_in_log(),'log_id','DESC', 10);
        $this->data['widgets'] =$model->getAll(new widgets());
    }
}