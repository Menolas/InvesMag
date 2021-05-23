<?php
/**
 * InvestMag functions and definitions
 *
 * 
 */

// вывод архива тега кастомной записи

add_filter('pre_get_posts', 'query_post_type');

function query_post_type($query) {

  if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('post','simple-post', 'slider', 'card', 'opinions'); // replace cpt to your custom post type
    $query->set('post_type', $post_type);
    return $query;
    }
}

// добавление колонки ID  в админке

function true_id($args){
    $args['post_page_id'] = 'ID';
    return $args;
}
function true_custom($column, $id){
    if($column === 'post_page_id'){
        echo $id;
    }
}
 
add_filter('manage_pages_columns', 'true_id', 5);
add_action('manage_pages_custom_column', 'true_custom', 5, 2);
add_filter('manage_posts_columns', 'true_id', 5);
add_action('manage_posts_custom_column', 'true_custom', 5, 2);

/**
 * Enqueue scripts and styles.
 */

function investmag_scripts() {

    wp_register_style('style', get_template_directory_uri() . '/css/style.css', [], 1, 'all');
    wp_enqueue_style('style');

    wp_enqueue_script( 'slick-slider-lib', get_stylesheet_directory_uri() . '/js/vendor/slick.min.js', array('jquery'));

    wp_enqueue_script( 'header-desktop', get_stylesheet_directory_uri() . '/js/header-desktop.js', array('jquery'));
    
    wp_enqueue_script( 'pictures-wrap-height', get_stylesheet_directory_uri() . '/js/pictures-wrap-height.js', array('jquery'));

    wp_enqueue_script( 'mobile-menu', get_stylesheet_directory_uri() . '/js/mobile-menu.js', [], 1, true);

    wp_enqueue_script( 'scroll-to-top', get_stylesheet_directory_uri() . '/js/to-top.js', array('jquery'));

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

    wp_enqueue_script( 'load-opinions', get_stylesheet_directory_uri() . '/js/load-opinions.js', array('jquery'));
    wp_localize_script('load-opinions', 'myPlugin', $ajax_param);

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

require get_template_directory() . '/inc/theme-support.php';

require get_template_directory() . '/inc/custom-post.php';
require get_template_directory() . '/inc/shortcodes.php';

// снятие фильтров WP

//remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
remove_filter('the_excerpt_embed', 'wpautop');
remove_filter('widget_text_content', 'wpautop');
add_filter('widget_text', 'do_shortcode');


// выясняем какие новости у нас в главном блоке и получаем массив с их объектами

$main_post = get_posts(array(
    'numberposts' => 1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'main',
    ));

$top_posts = get_field('to-top', $main_post[0]->ID);

$exclude_string = '';

foreach ($top_posts as $top_post) {
    $exclude_string .= $top_post->ID . ',';
}

$exclude_string = explode(',', $exclude_string);

// подгрузка новостей по AJAX из категории Акции на главной странице 

add_action('wp_ajax_loadmore_stocks', 'load_more_stocks');
add_action('wp_ajax_nopriv_loadmore_stocks', 'load_more_stocks');

function load_more_stocks(){

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

// AJAX подгрузка потов блока "Мнения" на главной

add_action('wp_ajax_load_opinions', 'load_opinions');
add_action('wp_ajax_nopriv_load_opinions', 'load_opinions');

function load_opinions()
{
    $post_number = 3;
    $width = ($_POST['width']);
    if ($width > 900) {
        $post_number = 4;
    }

    $args['post_type'] = 'opinions';
    $args['posts_per_page'] = $post_number;
 
    // if( !wp_verify_nonce($_POST['nonce'], 'myajax-nonce')){ 
    //     wp_die();
    // }

    query_posts($args);

    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <div class="opinions__item">
                <?=get_template_part('template-parts/content', 'opinions-mini');?>
            </div>
        <?php endwhile; endif;
        wp_reset_postdata();

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
