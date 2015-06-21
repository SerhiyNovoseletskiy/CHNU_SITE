<?php

class c_profile extends Controller
{
    function _index()
    {
        global $model;

        LoadModel('admin', 'user');

        $user = $model->getRowByParam(
            new users(),
            array(
                'login' => $this->url['2']
            )
        );

        if (empty($user)) {
            header('Location: /');
            return;
        }

        $user_info = $model->getRowByParam(
            new user_info(),
            array(
                'user_id' => $user->_user_id
            )
        );

        $this->meta['title'] = $user_info->sur_name . ' ' . $user_info->first_name . '' . $user_info->last_name;
        $this->data['user'] = $user;
        $this->data['info'] = $user_info;
    }
}