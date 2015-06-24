<?php
class v_users {
    public $_user_id;
    public $login;
    public $avatar;
    public $group_id;
    public $first_name;
    public $last_name;
    public $sur_name;
    public $birthday;
    public $entry_year;
    public $gradation_year;
    public $department_id;

    function getName() {
        return $this->sur_name . ' '. $this->first_name;
    }
}