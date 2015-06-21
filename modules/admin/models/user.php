<?php

class users
{
    public $_user_id;
    public $login;
    public $pass;
    public $group_id;
    public $avatar = 'no-avatar.png';
}

class user_groups
{
    public $_group_id;
    public $name;
    public $root;
    public $su;
}

class user_info
{
    public $_info_id;
    public $user_id;
    public $first_name;
    public $last_name;
    public $sur_name;
    public $email;
    public $telephone;
    public $adress;
}