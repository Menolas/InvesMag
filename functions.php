<?php
/**
 * InvestMag functions and definitions
 *
 * 
 */

require get_template_directory() . '/inc/theme-scripts.php';

// вывод архива тега кастомной записи

// function register_my_session()
// {
//   if( !session_id() )
//   {
//     session_start();
//   }
// }

// add_action('init', 'register_my_session');

add_filter('pre_get_posts', 'query_post_type');

function query_post_type($query) {

  if(is_category() || is_tag()) {

    $post_type = get_query_var('post_type');

    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('main', 'slider', 'card', 'opinions', 'nav_menu_item','partners'); // replace cpt to your custom post type
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
* Чистка хедера
*/
//require get_template_directory() . '/inc/clean-header.php';

/**
* Код для отключения и удаления wp-json и oembed в WordPress
*/
//require get_template_directory() . '/inc/remove-json.php';
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
require get_template_directory() . '/inc/banners.php';

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
    'post_type'   => 'top',
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

    $args['post_type'] = array('main', 'slider', 'cards');
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

function get_article_dateY ($date_1 , $date_2) {

    $days = dateDifference($date_1 , $date_2);

    if ($days > 3) {
      $article_date = get_the_date('j F Y');
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

remove_filter('the_content', 'wptexturize');
remove_filter('wp_title', 'wptexturize');  /*Заголовок страницы*/
remove_filter('the_title', 'wptexturize');  /*Заголовок записи*/
remove_filter('single_post_title', 'wptexturize');  /*Заголовок поста*/
remove_filter('bloginfo', 'wptexturize');  /*Информация о сайте, блоге*/
remove_filter('the_excerpt', 'wptexturize');  /*Отрывок, цитата поста - первые 55 слов*/
remove_filter('widget_title', 'wptexturize');  /*Заголовок виджета*/
remove_filter('wp_list_categories', 'wptexturize');  /*Категории, рубрики*/
remove_filter('term_name', 'wptexturize');  /*Название таксономии*/
remove_filter('link_name', 'wptexturize');  /*Название ссылки*/
remove_filter('link_description', 'wptexturize');  /*Описание ссылки*/
remove_filter('link_notes', 'wptexturize');  /*Записи ссылки*/

add_action('init', 'customRSS');
function customRSS(){
        add_feed('google', 'customRSSFunc');
}

function customRSSFunc(){
        get_template_part('rss', 'google');
}
