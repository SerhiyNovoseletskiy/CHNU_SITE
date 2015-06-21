<?
/*
 * Author: Novoseletskiy Serhiy
 * Email : novoseletskiyserhiy@gmail.com
 * vk.com : http://vk.com/serrg1994
 */
require_once 'application/api.php';
require_once 'application/config.php';
require_once 'application/core.php';
require_once 'application/routing.php';

$sql = LoadPlugin('MySQL');
$model = LoadPlugin('Model');
$sb = new SiteBulder();