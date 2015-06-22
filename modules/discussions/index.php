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
        $this->data = $discussion;
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

    function _get_messages() {
        $this->template = false;

        global $model;
        LoadModel('discussions', 'discussions');

        $this->data = $model->getByParam(
            new v_discussions(),
            array(
                'discussion' => $this->url[3]
            ),'id', 'asc'
        );
        LoadView('discussions', 'chat', $this->data);
    }

    function _send() {
        $this->template = false;

        global $model;
        LoadModel('discussions', 'discussions');

        $message = new discussion_messages();
        $message->discussion = $_POST['discussion'];
        $message->message = $_POST['message'];
        $message->user = $this->user->user->_user_id;
        $message->time = time();

        $model->save($message);
    }
}