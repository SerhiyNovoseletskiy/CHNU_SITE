<?php

class MenuBuilder
{
    function build($menu) {
        echo "<ul class='{$menu['class']}' id = '{$menu['id']}'>";

        $items = $menu[LANGUAGE];

        foreach($items as $item) {
            if ($_SERVER['REQUEST_URI'] == $item['link'])
                $active = $menu['active_class'];
            else
                $active = '';

            echo "<li class='{$active}'><a href='{$item['link']}' class='{$item['class']}'>{$item['title']}</a>";

            if ($item['children'] !== null) {
                echo "<ul class='{$item['clild_class']}'>";
                foreach($item['children'] as $sub) {
                    echo "<li><a href='{$sub['link']}' class='{$sub['class']}'>{$sub['title']}</a></li>";
                }
                echo "</ul>";
            }

            echo '</li>';
        }

        echo '</ul>';
    }
}