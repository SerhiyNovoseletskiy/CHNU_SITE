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