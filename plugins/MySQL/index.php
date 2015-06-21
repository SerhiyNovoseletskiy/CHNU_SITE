<?php

class MySQL
{
    private $con = null;

    function __construct()
    {
        $this->con = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
        mysql_select_db(DB) or die(mysql_error());

        mysql_query("SET NAMES 'utf8'");
        mysql_query("SET CHARACTER SET 'utf8'");
    }

    function close()
    {
        if ($this->con !== null)
            mysql_close($this->con);
    }
}
