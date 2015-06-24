<?php

class c_profile extends Controller
{
    function _index()
    {
        global $model;

        LoadModel('admin', 'v_users');
        LoadModel('account', 'department');
        LoadModel('account', 'speciality');
        $me = LoadPlugin('User');

        $user = $model->getRowByParam(
            new v_users(),
            array(
                'login' => $this->url['2']
            )
        );

        if (empty($user)) {
            header('Location: /');
            return;
        }

        if ($me->user->_user_id == $user->_user_id) {
            header('Location: /account');
            return;
        }


        $this->meta['title'] = $user->sur_name . ' ' . $user->first_name . ' ' . $user->last_name;
        $this->data['user'] = $user;
        $this->data['department'] = $model->getById(new department(), $user->department_id);
        $this->data['speciality'] = $model->getById(new speciality(), $user->speciality_id);
    }
}