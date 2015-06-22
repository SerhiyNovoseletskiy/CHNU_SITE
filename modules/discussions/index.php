<?php
class c_discussions extends Controller {
    private $user;
    function __construct() {
        $this->user = LoadPlugin('User');

        if (!$this->user->isAuth()) {
            header('Location: /');
        }
    }

    function _index() {
        $this->meta['title'] = DISCUSSIONS;

        global $model;
        LoadModel('discussions', 'discussions');

        $this->data = $model->getAll(new discussions(), 'id', 'desc');
    }


    function _discussion() {
        global $model;
        LoadModel('discussions', 'discussions');

        $discussion = $model->getById(new discussions(), $this->url[3]);
        $this->meta['title'] = $discussion->name;

        $this->view = 'discussion';
    }

    function _create() {
        $this->template = false;

        global $model;
        LoadModel('discussions', 'discussions');

        $discussion = new discussions();
        $discussion->name = $_POST['name'];
        $discussion->user = $this->user->user->_user_id;

        $model->save($discussion);

        header('Location: /discussions');
    }
}