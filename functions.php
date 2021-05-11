<?php
/**
 * InvestMag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package InvestMag
 */

if ( ! function_exists( 'investmag_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function investmag_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on InvestMag, use a find and replace
         * to change 'investmag' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'investmag', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        //add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__( 'Primary', 'investmag' ),
                'Footer Menu' => 'Footer Menu Location',
                'Footer Menu Secondary' => 'Footer Second Menu Location',
                'Mobile Small Menu' => 'Mobile Small Menu Location',
                'Tags List Menu' => 'Secondary Menu'
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'investmag_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
    }
endif;

add_action( 'after_setup_theme', 'investmag_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
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

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/custom-post.php';
require get_template_directory() . '/inc/shortcodes.php';

//remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
remove_filter('the_excerpt_embed', 'wpautop');
remove_filter('widget_text_content', 'wpautop');
add_filter('widget_text', 'do_shortcode');

// подгрузка новостей из категории Акции на главной странице 

add_action('wp_ajax_loadmore_stocks', 'load_more_stocks');
add_action('wp_ajax_nopriv_loadmore_stocks', 'load_more_stocks');

function load_more_stocks(){

    $args['post_type'] = 'news';
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

add_action('acf/save_post', 'my_acf_save_post');
function my_acf_save_post($post_id) {

    $the_post = get_post($post_id);

    if ($the_post->post_type != 'main') {

        $to_top_value = get_field('top', $post_id);
        
        if ($to_top_value) {

            $top_post = array(
                
                'ID' => $the_post->ID,
                'post_author' => $the_post->post_author,
                'post_content' => $the_post->post_content, 
                'post_date' => $the_post->post_date,
                'post_date_gmt' => $the_post->post_date_gmt,
                'post_excerpt' => $the_post->post_excerpt,
                'post_name' => $the_post->post_name,
                'post_status' => 'publish',
                'post_title' => $the_post->post_title,
                'post_type' => 'main',
                'tags_input' => get_the_tags($post_id),
                'tax_input' => array( get_the_terms($post_id, 'rubrics')),
            );

            $post_ID = wp_insert_post($top_post);

            $thumbnail_id = get_post_thumbnail_id($the_post);
            $post_kind = $the_post->post_type;
            $field_key = 'post_kind';
            
            set_post_thumbnail($post_ID, $thumbnail_id);
            update_field($field_key, $post_kind, $post_ID);
            update_field('top', array('в топ'), $post_ID);

            wp_reset_postdata();
        
        }
    }
    
}

add_action('acf/save_post', 'my_acf_turn_post');
function my_acf_turn_post($post_id) {

    $the_post = get_post($post_id);

    if ($the_post->post_type == 'main') {

        $to_top_value = get_field('top', $post_id);

        if (!$to_top_value) {

            $top_post = array(
                
                'ID' => $the_post->ID,
                'post_author' => $the_post->post_author,
                'post_content' => $the_post->post_content, 
                'post_date' => $the_post->post_date,
                'post_date_gmt' => $the_post->post_date_gmt,
                'post_excerpt' => $the_post->post_excerpt,
                'post_name' => $the_post->post_name,
                'post_status' => 'publish',
                'post_title' => $the_post->post_title,
                'post_type' => get_field('post_kind', $post_id),
                'tags_input' => get_the_tags($post_id),
                'tax_input' => array( get_the_terms($post_id, 'rubrics')),
            );

            $post_ID = wp_insert_post($top_post);

            $thumbnail_id = get_post_thumbnail_id($the_post);
            
            set_post_thumbnail($post_ID, $thumbnail_id);
            
            update_field('top', array(0), $post_ID);

            wp_reset_postdata();
        }
    } 
}

function dateDifference($date_1 , $date_2, $differenceFormat = '%a')
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);
}
