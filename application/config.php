<?php
define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PASS", '');
define("DB", 'chnu');

define("SITE_NAME", 'ЧНУ');
define("APP_VERSION", 0.2);
define("DEFAULT_LANGUAGE", 'ua');

if (!isset($_COOKIE['language']))
    define('LANGUAGE', 'ua');
else
    define('LANGUAGE', $_COOKIE['language']);

define('TEMPLATE', 'chnu');
define('DEBUG',true);