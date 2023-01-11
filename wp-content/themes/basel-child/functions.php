<?php
// =========================== PARENT STYLES =========================================================================

function my_theme_enqueue_styles()
{


    $parenthandle = 'parent-style';
    $theme = wp_get_theme();
    wp_enqueue_style($parenthandle, get_template_directory_uri() . '/style.css', array(), $theme->parent()->get('Version'));

    wp_enqueue_style('child-style', get_stylesheet_uri(), array($parenthandle), $theme->get('Version'));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');


// =========================CUSTOM CSS=========================================================================

add_action('wp_enqueue_scripts', 'swke_custom_css_stylesheet', 100);

function swke_custom_css_stylesheet()
{
    wp_register_style('swke_custom-css-file', get_stylesheet_directory_uri(__FILE__) . '/assets/css/custom.css');
}
wp_enqueue_style('swke_custom-css-file');


// =========================FONTAWESOME CSS=========================================================================

add_action('wp_enqueue_scripts', 'swke_fontawesome', 100);

function swke_fontawesome()
{
    wp_register_style('swke_fontawesomecdn', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
}
wp_enqueue_style('swke_fontawesomecdn');

// =========================FONT FAMILY CSS=========================================================================

add_action('wp_enqueue_scripts', 'swke_fontfamilyfn', 120);

function swke_fontfamilyfn()
{
    wp_register_style('swke_fontfamily', "https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap");
}
wp_enqueue_style('swke_fontfamily');


// ======================BOOTSTRAP CSS =========================================================================

function your_script_enqueue()
{
    wp_enqueue_script('bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('jquery'), NULL, true);

    wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', false, NULL, 'all');
}

add_action('wp_enqueue_scripts', 'your_script_enqueue');



// =====================PRECONNECT =========================================================================

function swk_enqueue_the_preconnect()
{
    wp_enqueue_style('swke_preconnect', "https://fonts.googleapis.com");
    wp_enqueue_style('swke_preconnect', "https://fonts.gstatic.com");
}
add_action('wp_enqueue_scripts', 'swk_enqueue_the_preconnect');
