<?php

/**
 * Enqueue scripts and styles.
 */

function investmag_scripts() {

    wp_register_style('style', get_template_directory_uri() . '/css/style.css', [], 1, 'all');
    wp_enqueue_style('style');

    wp_enqueue_script( 'slick-slider-lib', get_stylesheet_directory_uri() . '/js/vendor/slick.min.js', array('jquery'));

    wp_enqueue_script( 'header-desktop', get_stylesheet_directory_uri() . '/js/jquery-header-desktop.js', array('jquery'));
    
    wp_enqueue_script( 'pictures-wrap-height', get_stylesheet_directory_uri() . '/js/jquery-pictures-wrap-height.js', array('jquery'));
    wp_enqueue_script( 'popup-cookie', get_stylesheet_directory_uri() . '/js/jquery-popup-cookie.js', array('jquery'));

    wp_enqueue_script( 'opinions-slider', get_stylesheet_directory_uri() . '/js/jquery-opinions-slider.js', array('jquery'));

    wp_enqueue_script('flex-box', get_template_directory_uri() . '/js/jquery-flex-box.js', array('jquery'));
    
    wp_enqueue_script('new-tab-for-link', get_template_directory_uri() . '/js/jquery-new-tab-for-link.js', array('jquery'));

    //wp_enqueue_script( 'cards-scrolling', get_stylesheet_directory_uri() . '/js/cards-scrolling.js', array('jquery'));

    wp_enqueue_script( 'mobile-menu', get_stylesheet_directory_uri() . '/js/mobile-menu.js', [], 1, true);

    wp_enqueue_script( 'scroll-to-top', get_stylesheet_directory_uri() . '/js/to-top.js', [], 1, true);

    wp_register_script('header-sticky', get_template_directory_uri() . '/js/header-sticky.js', [], 1, true);
    wp_enqueue_script('header-sticky');

    wp_register_script('search-popup', get_template_directory_uri() . '/js/search-form-popup.js', [], 1, true);
    wp_enqueue_script('search-popup');

    wp_register_script('main-menu-tags', get_template_directory_uri() . '/js/main-menu-tags.js', [], 1, true);
    wp_enqueue_script('main-menu-tags');

    //wp_register_script('card-aside', get_template_directory_uri() . '/js/card-aside.js', [], 1, true);
    //wp_enqueue_script('card-aside');

    wp_register_script('themes-page', get_template_directory_uri() . '/js/themes-page.js', [], 1, true);
    wp_enqueue_script('themes-page');

    wp_register_script('share-social', get_template_directory_uri() . '/js/share-social.js', [], 1, true);
    wp_enqueue_script('share-social');

    $ajax_param = array('ajaxurl' => admin_url('admin-ajax.php'));

    wp_enqueue_script( 'load-more-stocks', get_stylesheet_directory_uri() . '/js/jquery-stocks-load.js', array('jquery'));
    wp_localize_script('load-more-stocks', 'myPlugin', $ajax_param);

    //wp_enqueue_script( 'load-opinions', get_stylesheet_directory_uri() . '/js/load-opinions.js', array('jquery'));
    //wp_localize_script('load-opinions', 'myPlugin', $ajax_param);

}

add_action( 'wp_enqueue_scripts', 'investmag_scripts' );

add_action( 'wp_enqueue_scripts', 'load_old_jquery_fix', 100 );

function load_old_jquery_fix() {
    if ( ! is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', ( "//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" ), false, '1.11.3' );
        wp_enqueue_script( 'jquery' );
    }
}
