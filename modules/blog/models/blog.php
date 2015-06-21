<?php
class blog {
    public $_id;
    public $alias;
    public $image;
    public $rubrick;
    public $time_to_publick;
    public $keywords;
    public $description;
}

class blog_details {
    public $_id;
    public $blog;
    public $language;
    public $title;
    public $content;
}

class v_blog {
    public $_id;
    public $title;
    public $alias;
    public $image;
    public $rubrick;
    public $time_to_publick;
    public $keywords;
    public $description;
    public $language;
    public $content;
}

class v_blog_for_admin  extends v_blog{
    public $rubrick_name;
}