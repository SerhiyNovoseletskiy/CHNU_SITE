<?php
class v_users {
    public $_user_id;
    public $login;
    public $avatar;
    public $group_id;
    public $first_name;
    public $last_name;
    public $sur_name;

    function getName() {
        return $this->sur_name . ' '. $this->first_name;
    }
}