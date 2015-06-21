<?php
class c_home extends Controller {
    function _index() {
        global $model;

        $this->meta['title'] = SITE_NAME;

        LoadModel('page','page');
        LoadModel('blog', 'blog');

        $this->data['about'] = $model->getRowByParam(
            new v_page(),
            array(
                'language' => LANGUAGE,
                'alias' => 'about'
            )
        );

        $this->data['last'] = $model->getByParam(
            new v_blog(),
            array(
                'language' => LANGUAGE
            ),
            'id',
            'desc',
            5 // Limit
        );


        $this->data['about']->content = explode('<!-- pagebreak -->', $this->data['about']->content);
        $this->data['about']->content = $this->data['about']->content[0];
    }
}