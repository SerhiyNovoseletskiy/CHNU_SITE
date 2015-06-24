<?php
class c_account extends Controller{
    private $user;

    function __construct() {
        $this->user = LoadPlugin('User');
    }

    function _index() {
        global $model;
        $this->meta['title'] = MY_ACCOUNT;
        $this->data['user'] = $this->user->user;
        $this->data['user_info'] = $model->getRowByParam(new user_info(), array('user_id' => $this->data['user']->_user_id));
        if ($this->user->isAuth())
            $this->view = 'index';
        else
            $this->view = 'login';
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
        $user_info->last_name = $_POST['last_name'];
        $user_info->sur_name = $_POST['sur_name'];
        $user_info->email = $_POST['email'];
        $user_info->telephone = $_POST['telephone'];

        // TODO check fields
        $user_info->birthday = $_POST['birthday'];
        $user_info->additional_info = $_POST['additional_info'];

        $model->update($user_info);

        header("Location: {$_SERVER[HTTP_REFERER]}");
    }

    function _sign_out() {
        $this->template = false;
        $this->user->signOut();
        setcookie('ecommerce_u_id',$this->user->user->_user_id,time()-5454,'/');
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }

    function _login() {
        $this->meta['title'] = SIGN_IN;
        $this->view = 'login';
    }

    function _sign_in() {
        $this->template = false;
        $this->user->Auth($_POST['login'], $_POST['password']);
        if ($this->user->isAuth()) {
            $_SESSION['user_id'] = $this->user->user->_user_id;
            $_SESSION['user_pass'] = $this->user->user->pass;
        }
        header('Location: /');
    }

    function _registration() {
        $this->meta['title'] = REGISTRATION;
        $this->view = 'registration';

        // Novoseletskiy
        global $model;
        LoadModel('account', 'department');
        $this->data['departments'] = $model->getAll(new department());
    }

    function _reg() {
        global $model;
        LoadModel('admin','user');
        $this->meta['title'] = REGISTRATION;
        $this->view = 'registration';
        $this->data['error'] = array();
        $this->data['user']['login'] = $_POST['login'];
        $this->data['user']['email'] = $_POST['email'];
        $this->data['user']['first_name'] = $_POST['first_name'];
        $this->data['user']['sur_name'] = $_POST['sur_name'];
        $this->data['user']['middle_name'] = $_POST['middle_name'];
        $this->data['user']['telephone'] = $_POST['telephone'];

        // TODO check fields [Vova]
        $this->data['user']['birthday'] = $_POST['birthday'];
        $this->data['user']['entry_year'] = $_POST['entry_year'];
        $this->data['user']['graduation_year'] = $_POST['graduation_year'];
        $this->data['user']['department_id'] = $_POST['department_id'];
        $this->data['user']['speciality_id'] = $_POST['speciality_id'];
        $this->data['user']['teaching_form'] = $_POST['teaching_form'];
        $this->data['user']['education_qualification'] = $_POST['education_qualification'];
        $this->data['user']['additional_info'] = $_POST['additional_info'];

        $login = $model->getRowByParam(new users(),array('login' => $_POST['login']));
        if (!empty($login)) {
            array_push($this->data['error'],LOGIN_BISY);
        }

        $email = $model->getRowByParam(new user_info(),array('email'=>$_POST['email']));
        if (!empty($email)) {
            array_push($this->data['error'],EMAIL_BISY);
        }

        if (count($this->data['error']) == 0) {
            $this->template = false;
            $user = new users();
            $user->login = $_POST['login'];
            $user->pass = md5($_POST['password']);
            $user->group_id = 2;
            $model->save($user);

            $info = new user_info();
            $info->first_name = $_POST['first_name'];
            $info->sur_name = $_POST['sur_name'];
            $info->last_name = $_POST['last_name'];
            $info->email = $_POST['email'];
            $info->telephone = $_POST['telephone'];

            // TODO check fields [Vova]
            $info->birthday = $_POST['birthday'];
            $info->entry_year = $_POST['entry_year'];
            $info->graduation_year = $_POST['graduation_year'];
            $info->department_id = $_POST['department'];
            $info->speciality_id = $_POST['speciality'];
            $info->teaching_form = $_POST['teaching_form'];
            $info->education_qualification = $_POST['education_qualification'];
            $info->additional_info = $_POST['additional_info'];

            $info->user_id = $model->getMaxId($user);
            $model->save($info);

            header('Location: /account/success');
        }
    }

    function _get_speciality_by_department_id(){
        global $model;
        LoadModel('account', 'speciality');
        $this->data = $model->getByParam(new speciality(), array('department_id' => $_POST['department_id']));
        $this->data['speciality'] = $this->data;
        foreach ($this->data['speciality'] as $spe) echo "<option value=" . $spe->_id . "> " . $spe->name . " </option>";
        $this->template = false;
    }
}