<?php
function LoadPlugin($plugin)
{
    if (is_file('plugins/' . $plugin . '/index.php')) {
        require_once 'plugins/' . $plugin . '/index.php';

        if (class_exists($plugin)) {
            return new $plugin;
        } else {
            return false;
        }

    } else {
        return false;
    }
}

function LoadModel($module, $model)
{
    if (is_file('modules/' . $module . '/models/' . $model . '.php'))
        require_once 'modules/' . $module . '/models/' . $model . '.php';
}

function LoadView($module, $view, $data = null, $data1 = null)
{
    if (is_file('templates/'.TEMPLATE.'/views/'.$module.'/'.$view.'.html'))
        require_once 'templates/'.TEMPLATE.'/views/'.$module.'/'.$view.'.html';
    elseif
    (is_file('modules/' . $module . '/views/' . $view . '.html'))
        require_once 'modules/' . $module . '/views/' . $view . '.html';

}

function LoadLanguage($module)
{
    if (is_file('languages/' . LANGUAGE . '.' . $module . '.php')) {
        require_once 'languages/' . LANGUAGE . '.' . $module . '.php';
    }
}

function LoadTemplate($module, $view, $data, $meta, $data1)
{
    if (is_file('templates/' . TEMPLATE . '/index.php'))
        require_once 'templates/' . TEMPLATE . '/index.php';
}