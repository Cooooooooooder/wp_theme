<?php

if (!function_exists('wpc_load_assets')) {
    function wpc_load_assets()
    {
        wp_enqueue_style('wpc_bootstrap',  get_template_directory_uri() . '/assets/css/bootstrap.css', [], false);
        wp_enqueue_style('wpc_font-awesome',  get_template_directory_uri() . '/assets/css/font-awesome.min.css', ['wpc_bootstrap'], false);
        wp_enqueue_style('wpc_template-style',  get_template_directory_uri() . '/assets/style.css', [], false);
        wp_enqueue_style('wpc_template-responsive',  get_template_directory_uri() . '/assets/css/responsive.css', [], false);
        wp_enqueue_style('wpc_template-colors',  get_template_directory_uri() . '/assets/css/colors.css', [], false);

        // wp_enqueue_script('wpc_jquery-script', get_template_directory_uri() . '/assets/js/jquery.min.js', [], false, true);
        wp_enqueue_script('jquery');
        wp_enqueue_script('wpc_tether-script', get_template_directory_uri() . '/assets/js/tether.min.js', [], false, true);
        wp_enqueue_script('wpc_bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', [], false, true);
        wp_enqueue_script('wpc_custom-script', get_template_directory_uri() . '/assets/js/custom.js', [], false, true);
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
    }

    add_action('after_setup_theme', 'wpc_setup');
}
