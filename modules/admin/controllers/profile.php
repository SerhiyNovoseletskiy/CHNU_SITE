<?php

class c_profile extends Controller
{
    public $menu = array();

    function _index()
    {
        LoadModel('admin', 'user');
        global $model;

        $this->data['user'] = $model->getById(new users(), $_SESSION['user_id']);
        $this->data['user_info'] = $model->getRowByParam(new user_info(), array('user_id' => $this->data['user']->_user_id));

        $this->view = 'profile';
        $this->meta['title'] = EDIT_PROFILE;


        LoadModel('admin', 'menu');
        $this->menu_struct = new menu();
        $this->menu_struct->tag = 'button';
        $this->menu_struct->form = 'profile';
        $this->menu_struct->value = '<span class="glyphicon glyphicon-floppy-save"></span>';
        $this->menu_struct->class = 'btn btn-primary';
        array_push($this->menu, $this->menu_struct);

    }

    function _update()
    {
        global $model;
        $this->template = false;
        LoadModel('admin', 'user');
        $user = $model->getById(new users(), $_SESSION['user_id']);
        $user_info = $model->getRowByParam(new user_info(), array('user_id' => $user->_user_id));

        if (!empty($_POST['password']))
            $user->pass = md5($_POST['password']);

        $_FILES['avatar']['type'] = strtolower($_FILES['avatar']['type']);

        if ($_FILES['avatar']['type'] == 'image/png'
            || $_FILES['avatar']['type'] == 'image/jpg'
            || $_FILES['avatar']['type'] == 'image/gif'
            || $_FILES['avatar']['type'] == 'image/jpeg'
            || $_FILES['avatar']['type'] == 'image/pjpeg'
        ) {

            if ($user->avatar !== 'no-avatar.png') {
                unlink('content/avatars/' . $user->avatar);
            }

            $user->avatar = md5(date('YmdHis')) . '.png';
            move_uploaded_file($_FILES['avatar']['tmp_name'], 'content/avatars/' . $user->avatar);
        }

        $model->update($user);


        $user_info->first_name = $_POST['first_name'];
        $user_info->middle_name = $_POST['middle_name'];
        $user_info->sur_name = $_POST['sur_name'];
        $user_info->email = $_POST['email'];
        $user_info->telephone = $_POST['telephone'];

        // TODO check fields
        $user_info->birthday = $_POST['birthday'];
        $user_info->entry_year = $_POST['entry_year'];
        $user_info->graduation_year = $_POST['graduation_year'];
        $user_info->department_id = $_POST['department_id'];
        $user_info->speciality_id = $_POST['speciality_id'];
        $user_info->teaching_form = $_POST['teaching_form'];
        $user_info->education_qualification = $_POST['education_qualification'];
        $user_info->additional_info = $_POST['additional_info'];

        $model->update($user_info);

        header("Location: {$_SERVER[HTTP_REFERER]}");
    }
}