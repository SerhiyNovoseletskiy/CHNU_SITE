<?php

class c_search extends Controller
{
    public function _index()
    {
        global $model;
        LoadModel('admin', 'v_users');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->template = false;

            $sql = LoadPlugin('SafeMySQL');
            $query = " SELECT first_name, last_name, sur_name, login, avatar FROM v_users WHERE group_id = 2 ";


            if (!empty($_POST['pib'])) {
                $name = explode(' ', $_POST['pib']);

                $name[0] = mysql_real_escape_string($name[0]);
                $name[1] = mysql_real_escape_string($name[1]);
                $name[2] = mysql_real_escape_string($name[2]);

                $query .= " AND first_name = '{$name[1]}'";
                $query .= " AND last_name = '{$name[2]}'";
                $query .= " AND sur_name = '{$name[0]}'";
            }

            if (!empty($_POST['birthday'])) {
                $_POST['birthday'] = mysql_real_escape_string($_POST['birthday']);
                $query .= " AND birthday = '{$_POST['birthday']}'";
            }

            if (!empty($_POST['graduation-year'])) {
                $_POST['graduation-year'] = mysql_real_escape_string($_POST['graduation-year']);
                $query .= " AND gradation_year = '{$_POST['graduation-year']}'";
            }

            if (!empty($_POST['department'])) {
                $_POST['department'] = mysql_real_escape_string($_POST['department']);
                $query .= " AND department_id = '{$_POST['department']}'";
            }

            $this->data = $sql->getAll($query);
            LoadView('search', 'search', $this->data);
        } else {
            $this->meta['title'] = SEARCH;

            LoadModel('account', 'department');
            $this->data['users'] = $model->getByParam(
                new v_users(),
                array(
                    'group_id' => 2
                )
            );

            $this->data['departments'] = $model->getAll(
                new department()
            );
        }

    }

}