<?php

class admin_page extends Controller
{
    public $menu_struct;
    public $menu = array();

    function _index()
    {
        global $model;
        $this->meta['title'] = PAGES;
        $this->view = 'admin.main';

        LoadModel('admin', 'menu');
        $this->menu_struct = new menu();

        $this->menu_struct->tag = 'a';
        $this->menu_struct->href = MODULE_URL . '/new';
        $this->menu_struct->value = '<span class="glyphicon glyphicon-plus"></span>';
        $this->menu_struct->class = 'btn btn-warning';
        $this->menu_struct->title = NEW_PAGE;

        array_push($this->menu, $this->menu_struct);

        LoadModel('page', 'page');
        $this->data = $model->getByParam(
            new v_page(),
            array(
                'language' => DEFAULT_LANGUAGE
            )
        );
    }

    function _new()
    {
        $this->meta['title'] = NEW_PAGE;
        $this->view = 'admin.new';

        LoadModel('admin', 'menu');

        $this->menu_struct = new menu();
        $this->menu_struct->tag = 'a';
        $this->menu_struct->href = MODULE_URL;
        $this->menu_struct->value = '<span class = "glyphicon glyphicon-arrow-left"></span>';
        $this->menu_struct->title = BACK;
        $this->menu_struct->class = 'btn btn-danger';
        array_push($this->menu, $this->menu_struct);
        unset($this->menu_struct);


        $this->menu_struct = new menu();
        $this->menu_struct->tag = 'button';
        $this->menu_struct->form = 'page';
        $this->menu_struct->value = SAVE;
        $this->menu_struct->class = 'btn btn-primary';
        array_push($this->menu, $this->menu_struct);
        unset($this->menu_struct);

        LoadModel('admin','languages');
        global $model;
        $this->data = $model->getAll(new languages());
    }

    function _edit()
    {
        $this->view = 'admin.edit';
        LoadModel('admin', 'menu');
        LoadModel('admin', 'languages');

        $this->menu_struct = new menu();
        $this->menu_struct->tag = 'a';
        $this->menu_struct->href = MODULE_URL;
        $this->menu_struct->value = '<span class = "glyphicon glyphicon-arrow-left"></span>';
        $this->menu_struct->title = BACK;
        $this->menu_struct->class = 'btn btn-danger';
        array_push($this->menu, $this->menu_struct);
        unset($this->menu_struct);

        $this->menu_struct = new menu();
        $this->menu_struct->tag = 'a';
        $this->menu_struct->href = MODULE_URL . '/new';
        $this->menu_struct->value = '<span class="glyphicon glyphicon-plus"></span>';
        $this->menu_struct->class = 'btn btn-warning';
        $this->menu_struct->title = NEW_PAGE;
        array_push($this->menu, $this->menu_struct);

        $this->menu_struct = new menu();
        $this->menu_struct->tag = 'button';
        $this->menu_struct->form = 'page';
        $this->menu_struct->value = SAVE;
        $this->menu_struct->class = 'btn btn-primary';
        array_push($this->menu, $this->menu_struct);
        unset($this->menu_struct);

        LoadModel('page', 'page');
        global $model;

        $this->data['page'] = $model->getById(
            new pages(),
            $this->url[5]
        );

        $languages = $model->getAll(new languages());
        foreach ($languages as $lang) {
            $this->data[$lang->code] = $model->getRowByParam(
                new page_content(),
                array(
                    'language' => $lang->code,
                    'page_id' => $this->data['page']->_page_id
                )
            );
        }


        $this->data['languages'] = $languages;
        $this->meta['title'] = $this->data[DEFAULT_LANGUAGE]->title;

    }

    function _save()
    {
        $this->template = false;
        global $model;
        LoadModel('page', 'page');
        LoadModel('admin','languages');
        $page = new pages();

        $page->alias = $_POST['alias'];
        $page->keywords = $_POST['keywords'];
        $page->description = $_POST['description'];
        $model->save($page);

        $id = $model->getMaxId($page);

        $languages = $model->getAll(new languages());

        foreach($languages as $language) {
            $page_content = new page_content();
            $page_content->language = $language->code;
            $page_content->page_id = $id;
            $page_content->title = $_POST['title_'.$language->code];
            $page_content->content = $_POST['content_'.$language->code];
            $model->save($page_content);
        }

        $module_url = MODULE_URL;
        header("Location: {$module_url}");

    }

    function _update()
    {
        $this->template = false;
        global $model;
        LoadModel('page', 'page');
        LoadModel('admin', 'languages');

        $page = $model->getById(
          new pages(),
          $_POST['page_id']
        );

        $page->alias = $_POST['alias'];
        $page->keywords = $_POST['keywords'];
        $page->description = $_POST['description'];
        $model->update($page);

        $languages = $model->getAll(new languages());
        foreach($languages as $lang) {
            $con = $model->getRowByparam(
                new page_content(),
                array(
                    'language' => $lang->code,
                    'page_id' => $page->_page_id
                )
            );

            $con->title = $_POST['title_'.$lang->code];
            $con->content = $_POST['content_'.$lang->code];

            $model->update($con);
        }

        $url = MODULE_URL . '/edit/' . $_POST['page_id'];
        header("Location: {$url}");
    }

    function _remove()
    {
        $this->template = false;
        global $model;
        LoadModel('page', 'page');

        $page = $model->getById(new pages(), $this->url[5]);
        $content = $model->getByParam(new page_content(), array('page_id' => $page->_page_id));

        foreach($content as $c)
            $model->delete($c);

        $model->delete($page);

        $module_url = MODULE_URL;
        header("Location: {$module_url}");
    }
}