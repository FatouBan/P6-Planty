<?php
// Action qui permet de charger des scripts dans notre thème
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Chargement du style.css
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', 
    array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}


/*** Hook Filter  ***/
add_filter('show_admin_bar', '__return_false');

add_filter('wp_nav_menu_items', 'admin_link', 10, 2);


function admin_link($items, $args)
{

    if (is_user_logged_in()) {
        $adminlink = admin_url();
        $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page parent hfe-creative-menu"><a href="' . $adminlink . '" class="hfe-menu-item">Admin</a></li>';
        $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page parent hfe-creative-menu menu-commander"><a href="' . site_url('/commande') . '" class="hfe-menu-item">Commander</a></li>';
        return $items;

    } else {
        $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page parent hfe-creative-menu menu-commander"><a href="' . site_url('/commande') . '" class="hfe-menu-item">Commander</a></li>';
        return $items;
    }

}

?>