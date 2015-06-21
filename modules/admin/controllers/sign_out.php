<?php

class c_sign_out extends Controller
{
    function _index()
    {
        $this->template = false;
        $this->user = LoadPlugin('User');

        $this->user->signOut();

        header("Location: /admin");
    }
}