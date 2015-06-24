<?php

class Graduates
{
    function get()
    {
        $sql = LoadPlugin('SafeMySQL');

        $result = $sql->getRow('SELECT * FROM v_users WHERE group_id = 2 ORDER BY RAND() LIMIT 1');

        echo '<a href = "/profile/' . $result['login'] . '"><img class = "thumbnail" src = "/content/avatars/' . $result['avatar'] . '"><p>'.$result['sur_name'].' '.$result['first_name'].' </p></a>';
    }
}