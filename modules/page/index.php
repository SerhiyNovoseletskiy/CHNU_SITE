<?php

class c_page extends Controller
{
    private function getByDefaultLanguage() {
        global $model;
        $this->data = $model->getRowByParam(
            new v_page(),
            array(
                'alias' => $this->url[2],
                'language' => LANGUAGE
            )
        );
    }
    function _index()
    {
        LoadModel('page', 'page');
        global $model;

        if (empty($this->url[3]))
            $this->getByDefaultLanguage();
        else {
            LoadModel('admin', 'languages');
            $lang = $model->getRowByParam(new languages(), array('code' => $this->url[3]));

            if (empty($lang))
                $this->getByDefaultLanguage();
            else
                $this->data = $model->getRowByParam(
                    new v_page(),
                    array(
                        'alias' => $this->url[2],
                        'language' => $lang->code
                    )
                );

        }

        if (empty($this->data)) {
            $this->template = false;
            require_once 'templates/'.TEMPLATE.'/404.html';
        }

        $this->view = 'page';
        $this->meta['title'] = $this->data->title;
        $this->meta['keywords'] = $this->data->keywords;
        $this->meta['description'] = $this->data->description;
    }
}