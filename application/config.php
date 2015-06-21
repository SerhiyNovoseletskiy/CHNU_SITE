<?php
define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PASS", '');
define("DB", 'chnu');

define("APP_VERSION", 0.2);
define("DEFAULT_LANGUAGE", 'ua');

if (!isset($_COOKIE['language'])) {
    define('LANGUAGE', 'ua');

} else {
    define('LANGUAGE', $_COOKIE['language']);

}

if (LANGUAGE == 'ua')
    define('SITE_NAME', '«Об’єднання Випускників та Друзів Чернівецького національного університету імені Юрія Федьковича»');
else
    define('SITE_NAME', '"Association of Alumni and Friends of Yuriy Fedkovych Chernivtsi National University"');

define('TEMPLATE', 'chnu');
define('DEBUG', true);