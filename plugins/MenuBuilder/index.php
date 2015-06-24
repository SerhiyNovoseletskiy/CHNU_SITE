<?php

class MenuBuilder
{
    function build($menu)
    {
        echo "<ul class='{$menu['class']}' id = '{$menu['id']}'>";

        $items = $menu[LANGUAGE];

        foreach ($items as $item) {
            if ($_SERVER['REQUEST_URI'] == $item['link'])
                $active = $menu['active_class'];
            else
                $active = '';

            echo "<li class='{$active}'><a href='{$item['link']}'>{$item['title']}</a>";


            echo '</li>';
        }

        echo '</ul>';
    }
}