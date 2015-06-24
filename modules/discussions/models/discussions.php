<?php
class discussions {
    public $_id;
    public $name;
    public $user;
}

class discussion_messages {
    public $_id;
    public $discussion;
    public $user;
    public $time;
    public $message;
}

class v_discussions extends discussion_messages {
    public $login;
    public $avatar;
    public $first_name;
    public $sur_name;
}