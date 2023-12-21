<?php
$menus = wp_get_nav_menus();

$itemsMenu = wp_get_nav_menu_items($menus[0]);

$url = $_SERVER['REQUEST_URI'];
$url_absolute = home_url() . $url;

echo '<aside class="sidebar"><nav class="nav"><ul class="nav__list"> ';

foreach ($itemsMenu as $navItem) {

    if ($url == $navItem->url || $url_absolute == $navItem->url) {
        $class = 'active';
    } else {
        $class = '';
    }
    echo '<li class="nav__elem"><a class="' . $class . '" title="' . $navItem->title . '" href="' . $navItem->url . '">' . $navItem->title . '</a></li>';
}
echo '</ul></nav>

<a class="sidebar__exit" href='. wp_logout_url() .'>Выход</a>
</aside>';
