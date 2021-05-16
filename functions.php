<?php
/**
 * InvestMag functions and definitions
 *
 * 
 */

add_theme_support('title-tag');

add_theme_support('post-thumbnails');
// set_post_thumbnail_size(330, 219); // размер миниатюры поста по умолчанию

// add_image_size('portret', 142, 9999); // 300 в ширину и без ограничения в высоту
// add_image_size('post-two-in-row', 510, 338, true); // Кадрирование изображения
// add_image_size('post-four-in-row', 240, 160, true); // Кадрирование изображения
// add_image_size('single-page', 600, 408, true); // Кадрирование изображения


add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'portret' => 'Портрет колумниста',
        'post-two-in-row' => '2 в ряд',
        'post-four-in-row' => '4 в ряд',
        'single-page' => 'Иллюстрация для поста',
    ) );
}
        
register_nav_menus(
    array(
        'menu-1' => esc_html__( 'Primary', 'investmag' ),
        'Footer Menu' => 'Footer Menu Location',
        'Footer Menu Secondary' => 'Footer Second Menu Location',
        'Mobile Small Menu' => 'Mobile Small Menu Location',
        'Tags List Menu' => 'Secondary Menu'
    )
);

add_theme_support( 'customize-selective-refresh-widgets' );

function investmag_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'investmag' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'investmag' ),
            'before_sidebar' => '<sidebar class="">', // WP 5.6
            'after_sidebar'  => '</sidebar>', // WP 5.6
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar страницы "Мнение"', 'investmag' ),
            'id'            => 'sidebar-opinions',
            'description'   => esc_html__( 'Add widgets here.', 'investmag' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar страницы "Статья"', 'investmag' ),
            'id'            => 'sidebar-article',
            'description'   => esc_html__( 'Add widgets here.', 'investmag' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar страницы "О площадке"', 'investmag' ),
            'id'            => 'sidebar-platform',
            'description'   => esc_html__( 'Add widgets here.', 'investmag' ),
            'before_sidebar' => '<aside class="platform-sidebar">', // WP 5.6
            'after_sidebar'  => '</aside>', // WP 5.6
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'investmag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function investmag_scripts() {

    wp_register_style('style', get_template_directory_uri() . '/css/style.css', [], 1, 'all');
    wp_enqueue_style('style');

    wp_enqueue_script( 'slick-slider-lib', get_stylesheet_directory_uri() . '/js/vendor/slick.min.js', array('jquery'));

    wp_enqueue_script( 'slick-slider', get_stylesheet_directory_uri() . '/js/slick.js', array('jquery'));

    wp_enqueue_script( 'mobile-menu', get_stylesheet_directory_uri() . '/js/mobile-menu.js', [], 1, true);

    wp_enqueue_script( 'scroll-to-top', get_stylesheet_directory_uri() . '/js/to-top.js', array('jquery'));

    wp_register_script('notify', get_template_directory_uri() . '/js/notify.js', [], 1, true);
    wp_enqueue_script('notify');

    wp_register_script('header-sticky', get_template_directory_uri() . '/js/header-sticky.js', [], 1, true);
    wp_enqueue_script('header-sticky');

    wp_register_script('search-popup', get_template_directory_uri() . '/js/search-form-popup.js', [], 1, true);
    wp_enqueue_script('search-popup');

    wp_register_script('main-menu-tags', get_template_directory_uri() . '/js/main-menu-tags.js', [], 1, true);
    wp_enqueue_script('main-menu-tags');

    wp_register_script('card-aside', get_template_directory_uri() . '/js/card-aside.js', [], 1, true);
    wp_enqueue_script('card-aside');

    wp_register_script('themes-page', get_template_directory_uri() . '/js/themes-page.js', [], 1, true);
    wp_enqueue_script('themes-page');

    wp_register_script('share-social', get_template_directory_uri() . '/js/share-social.js', [], 1, true);
    wp_enqueue_script('share-social');

    $ajax_param = array('ajaxurl' => admin_url('admin-ajax.php'));

    wp_enqueue_script( 'load-more-stocks', get_stylesheet_directory_uri() . '/js/stocks-load.js', array('jquery'));
    wp_localize_script('load-more-stocks', 'myPlugin', $ajax_param);

}
add_action( 'wp_enqueue_scripts', 'investmag_scripts' );

/**
* Чистка хедера
*/
require get_template_directory() . '/inc/clean-header.php';

/**
* Код для отключения и удаления wp-json и oembed в WordPress
*/
require get_template_directory() . '/inc/remove-json.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/custom-post.php';
require get_template_directory() . '/inc/shortcodes.php';

// снятие фильтров WP

//remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
remove_filter('the_excerpt_embed', 'wpautop');
remove_filter('widget_text_content', 'wpautop');
add_filter('widget_text', 'do_shortcode');

// подгрузка новостей по AJAX из категории Акции на главной странице 

add_action('wp_ajax_loadmore_stocks', 'load_more_stocks');
add_action('wp_ajax_nopriv_loadmore_stocks', 'load_more_stocks');

function load_more_stocks(){

    $main_post = get_posts(array(
    'numberposts' => 1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'main',
    ));

    //получаем список ID постов ля блока главных новостей на главной

    $top_posts = get_field('to-top', $main_post[0]->ID);

    $exclude_string = '';

    foreach ($top_posts as $top_post) {
        $exclude_string .= $top_post->ID . ',';
    }

    $exclude_string = explode(',', $exclude_string);

    $args['post_type'] = array('simple-post', 'slider', 'cards');
    $args['post__not_in']  = $exclude_string;
    $args['paged'] = $_POST['page'];
    $args['post_status'] = 'publish';
    $args['posts_per_page'] = 4;
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'rubrics',
            'field' => 'slug',
            'terms' => 'stocks'
        )
    );
    
    query_posts($args);
    
    if(have_posts()) :
        
        while(have_posts()): the_post(); ?>
            <div class="news-section__item  campaigns__item  news-section__item--4">
                <?=get_template_part('template-parts/content', 'mini-article');?>
            </div>
        <?php endwhile;
        wp_reset_postdata();

    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;

    wp_die();
}

// форматирование даты поста

function dateDifference($date_1 , $date_2, $differenceFormat = '%a')
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);
}

function get_article_date ($date_1 , $date_2) {

    $days = dateDifference($date_1 , $date_2);

    if ($days > 3) {
      $article_date = get_the_date('j F');
    }

    if ($days == 1) {
      $article_date = 'Вчера';
    }

    if ($days > 1  && $days <= 3) {
      $article_date = $days . ' дня назад';
    }

    if ($days == 0) {
      $article_date = 'Сегодня';
    }

    return $article_date;
}

//pagination of slider post

add_filter('wp_link_pages_args','add_next_and_number');

function add_next_and_number($args){
    if($args['next_or_number'] == 'next_and_number'){
        global $page, $numpages, $multipage, $more, $pagenow;
        $args['next_or_number'] = 'number';
        $prev = '';
        $next = '';
        if ( $multipage ) {
            if ( $more ) {
                $i = $page - 1;
                if ( $i && $more ) {
                    $prev .= _wp_link_page($i);
                    $prev .= $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>';
                }
                $i = $page + 1;
                if ( $i <= $numpages && $more ) {
                    $next .= _wp_link_page($i);
                    $next .= $args['link_before']. $args['nextpagelink'] . $args['link_after'] . '</a>';
                }
            }
        }
        $args['before'] = $args['before'].$prev;
        $args['after'] = $next.$args['after'];   
    }
    return $args;
}
