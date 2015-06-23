<?php

class c_messages extends Controller
{
    function _index()
    {
        $user = LoadPlugin('User');

        if (!$user->isAuth()) {
            header('Location: /');
            return;
        }

        $this->meta['title'] = MESSAGES;
        if (!empty($this->url[2])) {
            $this->view = 'messages';
            $this->data = $this->url[2];
        } else {
            $this->view = 'chats';
            global $model;
            LoadModel('messages', 'messages');
            LoadModel('admin', 'v_users');


            $senders = $model->getByParam(
                new messages(),
                array(
                    'to_user' => $user->user->_user_id
                ),
                null,
                null,
                null,
                null,
                array('from_user'),
                'DISTINCT'
            );

            $this->data = array();
            $sql = LoadPlugin('SafeMySQL');

            foreach($senders as $sender) {
                array_push($this->data,array(
                    'message' => $sql->getRow("SELECT * FROM messages WHERE
                  (from_user = ?i AND to_user = ?i) OR
                  (from_user = ?i AND to_user = ?i) ORDER BY id DESC  LIMIT 1",
                        $user->user->_user_id, $sender->from_user, $sender->from_user, $user->user->_user_id),
                    'user' => $model->getById(new v_users(), $sender->from_user)
                ));
            }
        }
    }

    function _get_messages()
    {
        $this->template = false;
        global $model;
        $user = LoadPlugin('User');

        if ($user->isAuth()) {
            $sql = LoadPlugin('SafeMySQL');
            LoadModel('admin', 'v_users');

            $result = $sql->getAll("SELECT * FROM messages WHERE
                  (from_user = ?i AND to_user = ?i) OR
                  (from_user = ?i AND to_user = ?i)",
                $user->user->_user_id, $this->url[3], $this->url[3], $user->user->_user_id);

            $this->data['messages'] = $result;
            $this->data[$user->user->_user_id] = $model->getById(new v_users(), $user->user->_user_id);
            $this->data[$this->url[3]] = $model->getById(new v_users(), $this->url[3]);
            $this->data['me'] = $user->user->_user_id;

            LoadView('messages', 'chat', $this->data);
        }
    }

    function _send()
    {
        $this->template = false;
        global $model;
        $user = LoadPlugin('User');

        if ($user->isAuth()) {
            LoadModel('messages', 'messages');
            $message = new messages();

            $message->to_user = $_POST['to_user'];
            $message->from_user = $user->user->_user_id;
            $message->time = time();
            $message->message = $_POST['message'];
            $model->save($message);
        }
    }

    function _set_is_read()
    {
        $this->template = false;
        global $model;
        $user = LoadPlugin('User');

        if ($user->isAuth()) {
            $sql = LoadPlugin('SafeMySQL');
            $sql->query("UPDATE messages SET isRead = '1' WHERE to_user = ?i and from_user = ?i", $user->user->_user_id, $_POST['from_user']);
            echo $_POST['from_user'];
        }
    }
}