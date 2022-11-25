<?php
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style(
        $parenthandle,
        get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        array($parenthandle),
        $theme->get('Version') // this only works if you have Version in the style header
    );
    
}

// change content label
function dkr_content_label($translation, $original)
{
    if ('Content' == $original) {
        return __('Description');
    } elseif (false !== strpos($original, 'Contents are optional hand-crafted summaries of your')) {
        return __('Custom Description');
    }
    return $translation;
}

add_filter('gettext', 'dkr_content_label', 10, 2);

// add_filter('template_redirect', function () {
//     ob_start(null, 0, 0);
// });


// add_action('template_redirect', function () {
//     ob_start();
// });

// add_action('admin_init', 'my_redirect_if_user_not_logged_in');

// function my_redirect_if_user_not_logged_in()
// {

//     if (!is_user_logged_in() && is_page('page slug or page ID here ')) {

//         wp_redirect('http://localhost/Softwareske/WP/QrMenu/wp-login.php');

//         exit;
//     }
// }

// function my_login_redirect($redirect_to, $request, $user)
// {
    
//     $redirect_to =  'http://localhost/Softwareske/WP/QrMenu/?menu_type=user&menu_slug=restaurant_menu&menu_id=2&parent_id=user_2&fed_nonce=3250f6d1bf';

//     return $redirect_to;
// }

// add_filter('login_redirect', 'my_login_redirect', 10, 3);

