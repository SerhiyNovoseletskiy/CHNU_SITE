<?php

class c_blog extends Controller
{
    private $page_limit = 6;

    private function get_by_default_language()
    {
        global $model;
        $this->data = $model->getRowByParam(
            new v_blog(),
            array(
                'alias' => $this->url[2],
                'language' => LANGUAGE
            )
        );
    }

    function _article()
    {
        $this->template = false;
        header("Location: /blog/" . $this->url[3]);
    }

    function _index()
    {

        if ($this->url[2] == 'article') {
            $this->template = false;
            require_once 'templates/' . TEMPLATE . '/404.html';

        } else {
            global $model;
            $this->view = 'article';
            LoadModel('blog', 'blog');

            if (!isset($this->url[3]))
                $this->get_by_default_language();
            else {
                LoadModel('admin', 'languages');
                $lang = $model->getRowByParam(new languages(), array('code' => $this->url[3]));

                if (empty($lang))
                    $this->get_by_default_language();
                else
                    $this->data = $model->getRowByParam(
                        new v_blog(),
                        array(
                            'alias' => $this->url[2],
                            'language' => $lang->code
                        )
                    );

            }

            if (empty($this->data)) {
                $this->template = false;
                require_once 'templates/' . TEMPLATE . '/404.html';
            }
            $this->meta['title'] = $this->data->title;
            $this->meta['keywords'] = $this->data->keywords;
            $this->meta['description'] = $this->data->description;
        }
    }

    function _rubric()
    {
        $this->view = 'rubrick';

        LoadModel('blog', 'blog');
        LoadModel('blog', 'rubrick');
        global $model;

        $rubrick = $model->getRowByParam(
            new v_blog_rubricks(),
            array(
                'alias' => $this->url[3],
                'language' => LANGUAGE
            )
        );

        if (empty($rubrick)) {
            $this->template = false;
            require_once 'templates/' . TEMPLATE . '/404.html';
        }

        $this->meta['title'] = $rubrick->name;

        $rec_count = $model->getCount(
            new blog(),
            array(
                'rubrick' => $rubrick->_id
            )
        );

        if (!empty($this->url[4])) {
            $page = $this->url[4] - 1;
            $offset = $this->page_limit * $page;
        } else {
            $page = 0;
            $offset = 0;
        }

        $this->data['pages'] = ceil($rec_count / $this->page_limit);
        $this->data['articles'] = $model->getByParam(
            new v_blog(),
            array(
                'rubrick' => $rubrick->_id,
                'language' => LANGUAGE
            ),
            'id',
            'desc',
            $offset,
            $this->page_limit,
            array(
                'title', 'alias', 'image', 'time_to_publick', 'content'
            )
        );
        $this->data['rubricks'] = $model->getByParam(
            new v_blog_rubricks(),
            array(
                'language' => LANGUAGE
            )
        );

        $this->data['current_rubrick'] = $rubrick;
        $this->data['current_page'] = $page;
    }
}