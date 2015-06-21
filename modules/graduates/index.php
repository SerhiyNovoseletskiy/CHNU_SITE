<?php

class c_graduates extends Controller {
    private $limit = 10;

    function _index() {
        global $model;
        $this->meta['title'] = GRADUATES;

        LoadModel('admin', 'v_users');

        $rec_count = $model->getCount(
            new v_users(),
            array(
                'group_id' => 2
            )
        );

        if (!empty($this->url[2])) {
            $page = $this->url[2] -1;
            $offset = $this->limit * $page;
        } else {
            $page = 0;
            $offset = 0;
        }

        $this->data['pages'] = ceil($rec_count / $this->limit);
        $this->data['graduates'] = $model->getByParam(
            new v_users(),
            array(
                'group_id' => 2
            ),
            'user_id',
            'desc',
            $offset,
            $this->limit
        );

        $this->data['current_page'] = $page;
    }
}