<?php
$base = get_template_directory_uri();
if (!function_exists('wpc_load_assets')) {
    function wpc_load_assets()
    {
        global $base;
        wp_enqueue_style('wpc_bootstrap',  $base . '/assets/css/bootstrap.css', [], false);
        wp_enqueue_style('wpc_font-awesome',  $base . '/assets/css/font-awesome.min.css', ['wpc_bootstrap'], false);
        wp_enqueue_style('wpc_template-style',  $base . '/assets/style.css', [], false);
        wp_enqueue_style('wpc_template-responsive',  $base . '/assets/css/responsive.css', [], false);
        wp_enqueue_style('wpc_template-colors',  $base . '/assets/css/colors.css', [], false);
        wp_enqueue_style('wpc_template-style-root',  $base . '/style.css', [], rand(1, 10000));

        // wp_enqueue_script('wpc_jquery-script', $base . '/assets/js/jquery.min.js', [], false, true);
        wp_enqueue_script('jquery');
        wp_enqueue_script('wpc_tether-script', $base . '/assets/js/tether.min.js', [], false, true);
        wp_enqueue_script('wpc_bootstrap-script', $base . '/assets/js/bootstrap.min.js', [], false, true);
        wp_enqueue_script('wpc_custom-script', $base . '/assets/js/custom.js', [], false, true);
        wp_enqueue_script('wpc_custom-masonry', $base . '/assets/js/masonry.js', [], false, true);
    }

    add_action('wp_enqueue_scripts', 'wpc_load_assets');
} else {
    // notify the admin that there is a duplicate in the names of functions
}

// function wpc_redefine_assets()
// {
//     wp_deregister_script('jquery');
//     wp_register_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', [], '3.7.1',true);
//     wp_enqueue_script('jquery');
// }
// add_action('wp_enqueue_scripts', 'wpc_redefine_assets');
if (!function_exists('wpc_setup')) {
    function wpc_setup()
    {
        add_theme_support('post-thumbnails');
register_nav_menus([
    "top-menu" => "Top Menu",
    "main-menu" => "Main Menu",
]);
    }
    add_action('after_setup_theme', 'wpc_setup');
}

// edit the content of the post to add "edited" in line
// if (!function_exists('edit_the_content_of_post')) {
//     function edit_the_content_of_post($content)
//     {
//         return $content . '<p> "edited" </p>';
//     }

//     add_filter('the_content', 'edit_the_content_of_post');
// }


require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/walkers/walkers.php';

