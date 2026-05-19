<?php

if (!function_exists('wpc_register_sidebars')) {
    function wpc_register_sidebars()
    {
        register_sidebar([
            'id' => 'blog-sidebar',
            'name' => 'Blog Sidebar',
            'description' => 'this sidebar appears in single posts and blog page ',
            'class' => 'blog-sidebar',
            'before_widget' => "<div class='widget'>",
            'after_widget' => '</div>',
            'before_title' => "<h2 class='widget-title'>",
            'after_title' => "</h2>",
        ]);
    }
    add_action('widgets_init', 'wpc_register_sidebars');
}
