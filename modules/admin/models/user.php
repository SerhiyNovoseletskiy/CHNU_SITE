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
    public $middle_name;
    public $sur_name;
    public $email;
    public $telephone;
    public $birthday;
    public $entry_year;
    public $graduation_year;
    public $department_id;
    public $speciality_id;
    public $teaching_form;
    public $education_qualification;
    public $additional_info;
}