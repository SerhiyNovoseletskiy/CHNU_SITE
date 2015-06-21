<?php

class admin_blog extends Controller
{
    function _index()
    {
        $this->meta['title'] = BLOG;
        $this->view = 'admin.index';
    }

    function _add_blog()
    {
        $this->meta['title'] = ADD_BLOG;
        $this->view = 'admin.add.blog';
        global $model;
        LoadModel('admin', 'languages');
        LoadModel('admin', 'menu');
        LoadModel('blog', 'rubrick');
        $this->data['languages'] = $model->getAll(new languages());
        $this->data['rubricks'] = $model->getByParam(
            new v_blog_rubricks(),
            array(
                'language' => DEFAULT_LANGUAGE
            )
        );


        $ms = new menu();
        $ms->tag = 'a';
        $ms->class = 'btn btn-danger';
        $ms->value = '<span class="glyphicon glyphicon-arrow-left"></span>';
        $ms->href = MODULE_URL;

        $this->menu = array($ms);

        $ms = new menu();
        $ms->tag = 'button';
        $ms->class = 'btn btn-success';
        $ms->value = '<span class="glyphicon glyphicon-saved"></span>';
        $ms->form = 'blog';
        $ms->type = 'submit';

        array_push($this->menu, $ms);

    }

    function _save_blog()
    {
        $this->template = false;
        LoadModel('blog', 'blog');
        LoadModel('admin', 'languages');
        global $model;
        $article = new blog();
        $article->alias = $_POST['alias'];
        $article->description = $_POST['description'];
        $article->keywords = $_POST['keywords'];
        $article->rubrick = $_POST['rubrick'];
        $article->time_to_publick = $_POST['time_to_publick'];

        if ($_FILES['image']['type'] == 'image/png'
            || $_FILES['image']['type'] == 'image/jpg'
            || $_FILES['image']['type'] == 'image/gif'
            || $_FILES['image']['type'] == 'image/jpeg'
            || $_FILES['image']['type'] == 'image/pjpeg'
        ) {
            $article->image = md5(date('YmdHis')) . '.jpg';
            move_uploaded_file($_FILES['image']['tmp_name'], 'content/blog/' . $article->image);

            $image = LoadPlugin('ImageResize');
            $size = getimagesize('content/blog/' . $article->image);
            $pr = $size[0] / $size[1];
            $image->resize('content/blog/' . $article->image, 'content/blog/600_' . $article->image,
                600, 600 / $pr);
        }

        $model->save($article);
        $id = $model->getMaxId($article);

        $languages = $model->getAll(new languages());

        foreach ($languages as $lang) {
            $details = new blog_details();
            $details->blog = $id;
            $details->language = $lang->code;
            $details->content = $_POST['content_' . $lang->code];
            $details->title = $_POST['title_' . $lang->code];
            $model->save($details);
        }

        header("Location: " . MODULE_URL . '/articles');
    }


    function _update_blog()
    {
        $this->template = false;
        $this->template = false;
        LoadModel('blog', 'blog');
        LoadModel('admin', 'languages');
        global $model;

        $article = $model->getById(
            new blog(),
            $_POST['id']
        );

        $article->alias = $_POST['alias'];
        $article->description = $_POST['description'];
        $article->keywords = $_POST['keywords'];
        $article->rubrick = $_POST['rubrick'];
        $article->time_to_publick = $_POST['time_to_publick'];

        if ($_FILES['image']['type'] == 'image/png'
            || $_FILES['image']['type'] == 'image/jpg'
            || $_FILES['image']['type'] == 'image/gif'
            || $_FILES['image']['type'] == 'image/jpeg'
            || $_FILES['image']['type'] == 'image/pjpeg'
        ) {
            if (is_file('content/blog/' . $article->image)) {
                unlink('content/blog/' . $article->image);
                unlink('content/blog/600_' . $article->image);
            }

            $article->image = md5(date('YmdHis')) . '.jpg';
            move_uploaded_file($_FILES['image']['tmp_name'], 'content/blog/' . $article->image);

            $image = LoadPlugin('ImageResize');
            $size = getimagesize('content/blog/' . $article->image);
            $pr = $size[0] / $size[1];
            $image->resize('content/blog/' . $article->image, 'content/blog/600_' . $article->image,
                600, 600 / $pr);
        }

        $model->update($article);

        $languages = $model->getAll(new languages());

        foreach ($languages as $lang) {
            $details = $model->getRowByParam(
                new blog_details(),
                array(
                    'language' => $lang->code,
                    'blog' => $article->_id
                )
            );

            $details->content = $_POST['content_' . $lang->code];
            $details->title = $_POST['title_' . $lang->code];
            $model->update($details);
        }

        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    function _articles()
    {
        global $model;
        LoadModel('blog', 'blog');
        LoadModel('blog', 'rubrick');
        LoadModel('admin','menu');

        $this->data['articles'] = $model->getByParam(
            new v_blog_for_admin(),
            array(
                'language' => DEFAULT_LANGUAGE
            ),
            'id',
            'DESC',
            null,
            null,
            array(
                'id', 'title','rubrick', 'rubrick_name'
            )
        );

        $this->data['rubricks'] = $model->getByParam(
            new v_blog_rubricks(),
            array(
                'language' => DEFAULT_LANGUAGE
            ),
            'id',
            'DESC',
            null,
            null,
            array('id', 'name', 'language')
        );
        $this->meta['title'] = ARTICLES;
        $this->view = 'articles';

        $menu = new menu();
        $menu->tag = 'a';
        $menu->href = MODULE_URL.'/add_blog';
        $menu->value = '<span class="glyphicon glyphicon-plus"></span>';
        $menu->class = 'btn btn-primary';

        $this->menu = array($menu);
    }

    function _edit_blog()
    {
        global $model;
        LoadModel('blog', 'blog');
        LoadModel('admin', 'languages');
        LoadModel('admin', 'menu');
        LoadModel('blog', 'rubrick');

        $this->data['article'] = $model->getById(
            new blog(),
            $this->url[5]
        );

        $languages = $model->getAll(
            new languages()
        );

        foreach ($languages as $lang) {
            $this->data[$lang->code] = $model->getRowByParam(
                new blog_details(),
                array(
                    'blog' => $this->data['article']->_id,
                    'language' => $lang->code
                )
            );
        }

        $this->data['languages'] = $languages;

        $this->data['rubricks'] = $model->getByParam(
            new v_blog_rubricks(),
            array(
                'language' => DEFAULT_LANGUAGE
            )
        );

        $this->meta['title'] = $this->data[DEFAULT_LANGUAGE]->title;
        $this->view = 'admin.edit.blog';

        $ms = new menu();
        $ms->tag = 'a';
        $ms->class = 'btn btn-danger';
        $ms->value = '<span class="glyphicon glyphicon-arrow-left"></span>';
        $ms->href = MODULE_URL;

        $this->menu = array($ms);
        $ms = new menu();
        $ms->tag = 'button';
        $ms->class = 'btn btn-success';
        $ms->value = '<span class="glyphicon glyphicon-saved"></span>';
        $ms->form = 'blog';
        $ms->type = 'submit';
        array_push($this->menu, $ms);
    }

    function _remove_blog() {
        global $model;
        LoadModel('blog','blog');

        $article = $model->getById(
            new blog(),
            $this->url[5]
        );

        if (is_file('content/blog/'.$article->image)) {
            unlink('content/blog/'.$article->image);
            unlink('content/blog/600_'.$article->image);
        }

        $model->delete($article);

        $details = $model->getByParam(
            new blog_details(),
            array(
                'blog' => $article->_id
            )
        );

        foreach($details as $det)
            $model->delete($det);

        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}