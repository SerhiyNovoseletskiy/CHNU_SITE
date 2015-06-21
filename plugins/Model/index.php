<?php

class Model
{
    function getById($class, $_id)
    {
        if (!is_numeric($_id))
            exit("Is not numeric");

        $class_name = get_class($class);
        $vars = get_class_vars($class_name);
        $id = $this->getId($vars);

        $keys = $id . ',';

        foreach ($vars as $var => $values) {
            if ($var !== '_' . $id)
                $keys .= '`'.$var.'`' . ',';
            else
                $var = substr($var, 1, strlen($var));
        }

        $keys = substr($keys, 0, strlen($keys) - 1);

        $query = "SELECT {$keys} FROM {$class_name} WHERE {$id} = {$_id} LIMIT 1";
        $res = mysql_fetch_array(mysql_query($query));

        foreach ($vars as $var => $values) {

            if ($var[0] == '_')
                $class->$var = $res[substr($var, 1, strlen($var))];
            else {
                $class->$var = $res[$var];
            }
        }

        return $class;
    }

    function getByParam($class, $params, $order_key = null, $order = null, $limit = null, $limit_to = null, $columns = null)
    {
        $class_name = get_class($class);

        $param = '';
        foreach ($params as $var => $value) {
            $param .= "`$var` = '" . mysql_real_escape_string($value) . "' and ";
        }

        $param = substr($param, 0, strlen($param) - 4);
        $cols = '*';

        if ($columns !== null) {
            $cols = '';
            foreach($columns as $var)
                $cols .= "`$var`,";

            $cols = substr($cols, 0, strlen($cols)-1);
        }

        $query = "SELECT {$cols} FROM {$class_name} WHERE {$param}";

        if ($order_key !== null)
            $query .= ' ORDER BY ' . $order_key;

        if ($order !== null)
            $query .= ' ' . $order;

        if ($limit !== null)
            $query .= ' LIMIT '.$limit;

        if ($limit_to !== null)
            $query .= ','.$limit_to;

        $r = mysql_query($query);
        $vars = get_class_vars($class_name);
        $array = array();

        while ($res = mysql_fetch_array($r)) {
            $class = new $class_name;

            foreach ($vars as $var => $values) {

                if ($var[0] == '_')
                    $class->$var = $res[substr($var, 1, strlen($var))];
                else {
                    $class->$var = $res[$var];
                }
            }

            array_push($array, $class);
        }

        return $array;

    }

    function getRowByParam($class, $params, $order_key = null, $order = null)
    {
        $result = $this->getByParam($class, $params, $order_key, $order, 1);
        return $result[0];
    }

    function getAll($class, $order_key = null, $order = null, $limit = null)
    {
        $class_name = get_class($class);
        $vars = get_class_vars($class_name);
        $id = $this->getId($vars);

        $keys = $id . ',';

        foreach ($vars as $var => $values) {
            if ($var !== '_' . $id)
                $keys .= '`'.$var.'`' . ',';
            else
                $var = substr($var, 1, strlen($var));
        }

        $keys = substr($keys, 0, strlen($keys) - 1);

        $query = "SELECT {$keys} FROM {$class_name}";

        if ($order_key !== null)
            $query .= ' ORDER BY ' . $order_key;

        if ($order !== null)
            $query .= ' ' . $order;

        if ($limit !== null)
            $query .= ' LIMIT '.$limit;

        $r = mysql_query($query);
        $array = array();

        while ($res = mysql_fetch_array($r)) {
            $class = new $class_name;

            foreach ($vars as $var => $values) {

                if ($var[0] == '_')
                    $class->$var = $res[substr($var, 1, strlen($var))];
                else {
                    $class->$var = $res[$var];
                }
            }

            array_push($array, $class);
        }

        return $array;
    }

    function save($class)
    {
        $class_name = get_class($class);
        $vars = get_class_vars($class_name);

        $fields = '';

        foreach ($vars as $var => $values)
            if ($var[0] !== '_')
                $fields .= "`$var`" . ',';

        $fields = substr($fields, 0, strlen($fields) - 1);

        $values = '';
        foreach ($vars as $var => $val)
            if ($var[0] !== '_')
                $values .= "'" . mysql_real_escape_string($class->$var) . "'" . ',';

        $values = substr($values, 0, strlen($values) - 1);

        $query = "INSERT INTO `{$class_name}` ({$fields}) VALUES ({$values})";
        mysql_query($query);
    }

    function update($class)
    {
        $class_name = get_class($class);
        $vars = get_class_vars($class_name);

        $id = '_' . $this->getId($vars);

        $params = '';

        foreach ($vars as $var => $values) {
            if ($var[0] !== '_') {
                $params .= "`{$var}` = '" . mysql_real_escape_string($class->$var) . "' ,";
            }

        }

        $params = substr($params, 0, strlen($params) - 1);

        $query = "UPDATE {$class_name} SET {$params} WHERE " . substr($id, 1, strlen($id)) . " = {$class->$id}";
        mysql_query($query);

    }

    function delete($class)
    {
        $class_name = get_class($class);
        $id = $this->getId(get_class_vars($class_name));

        $query = "DELETE FROM {$class_name} WHERE {$id} = ";
        $id = '_' . $id;
        $query .= $class->$id;

        if (!is_numeric($class->$id))
            exit("Is not numeric");

        mysql_query($query);
    }

    private function getId($vars)
    {
        foreach ($vars as $var => $value) {
            if ($var[0] == '_') {
                return substr($var, 1, strlen($var));
            }
        }
    }

    function  getMaxId($class)
    {
        $class_name = get_class($class);
        $id = $this->getId(get_class_vars($class_name));

        $query = "SELECT max({$id}) FROM {$class_name}";
        $max = mysql_fetch_row(mysql_query($query));
        return $max[0];
    }

    function getCount($class, $params = null) {
        $class_name = get_class($class);
        $id = $this->getId(get_class_vars($class_name));
        $query = "SELECT COUNT({$id}) FROM {$class_name}";

        if (!is_null($params)) {
            $param = '';
            foreach ($params as $var => $value) {
                $param .= "`$var` = '" . mysql_real_escape_string($value) . "' and ";
            }
            $param = substr($param, 0, strlen($param) - 4);
            $query .= " WHERE {$param}";
        }

        $count = mysql_fetch_row(mysql_query($query));
        return $count[0];
    }

    function clear($class)
    {
        $class_name = get_class($class);

        $query = "TRUNCATE `{$class_name}`";
        if (mysql_query($query))
            return true;
        else
            return false;
    }

}