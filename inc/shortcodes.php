<?php

function tel_link_function($atts, $content = null)
{
  extract(shortcode_atts(array(
        'link_text' => 'Telegram-канале',
        'link_url' => 'https://t.me/investmagpro',
        
    ), $atts));

    $return_string = '<div class="channel-link  channel-link--telegram">' . $content;
    $return_string .= ' <a href="'.$link_url.'" target="_blank">' . $link_text . '</a>' . '</div>';
    
    return $return_string;
}

function facebook_link_function($atts, $content = null)
{
  extract(shortcode_atts(array(
        'link_text' => 'Facebook',
        'link_url' => 'https://www.facebook.com/investmag.pro',
    ), $atts));

    $return_string = '<div class="channel-link  channel-link--facebook">'. $content;
    $return_string .= '<a href="'.$link_url.'" target="_blank">'. $link_text .' </a>'.'</div>';

    return $return_string;
}

function info_inset_function($atts, $content = null)
{
  extract(shortcode_atts(array(
        'link_text' => 'Telegram-канале',
    ), $atts));
    $return_string = '<div class="channel-link  channel-link--info">'.$content;
    $return_string .= ' <a href="">'.$link_text.' </a>'.'</div>';
    return $return_string;
}

function topic_article_function($atts)
{
  extract(shortcode_atts(array(
       'post_url' => '#',
    ), $atts));

    $post_id = url_to_postid($post_url);
    
    $post = get_post(array('ID' => $post_id), 'ARRAY_A');

    $return_string = '<div class="topic-article">';
    $return_string .= '<a class="topic-article__img-wrap" href="'.get_permalink($post_id).'">' . get_the_post_thumbnail($post_id) . '</a>';
    $return_string .= '<div class="topic-article__inner-wrap"><span>По теме</span>';
    $return_string .= '<a class="topic-article__header-link" href="'.get_permalink($post_id).'">';
    $return_string .= '<h3>' . get_the_title($post_id) . '</h3></a>';
    $return_string .= '</div></div>';

    return $return_string;
}

function inset_function($atts, $content = null)
{
    $return_string = '<div class="inset">' . do_shortcode($content) . '</div>';
    return $return_string;
}

function tag_link_function($atts, $content = null)
{
  extract(shortcode_atts(array(
       'slug' => '#',
    ), $atts));

    $term = get_term_by('name', $content, 'post_tag');

    $cat_link = get_category_link( $term->term_id );

    $return_string = '<a class="tag-link" href="'.$cat_link.'">' . do_shortcode($content) . '</a>';
    return $return_string;
}

function rubrics_link_function($atts, $content = null)
{
    $term = get_term_by('name', $content, 'rubrics');

    $cat_link = get_category_link( $term->term_id );

    $return_string = '<a class="rubrics-link" href="'.$cat_link.'">' . do_shortcode($content) . '</a>';
    return $return_string;
}

function themes_block_function($atts, $content = null)
{
    $return_string = '<div class="themes-block">' . do_shortcode($content);
    $return_string .= '<span class="themes-block__thingie"></span></div>';
    return $return_string;
}

function card_article_link_function($atts, $content = null)
{
  extract(shortcode_atts(array(
       'link_id' => '1',
    ), $atts));

    $return_string = '<div class="card-article-link">';
    $return_string .= '<span>'. $link_id .'.</span>';
    $return_string .= '<h2 id="'. $link_id .'" class="title__secondary">';
    $return_string .= do_shortcode($content).'</h2></div>';
    return $return_string;
}

function columnist_function($atts)
{
  extract(shortcode_atts(array(
       'columnist_id' => '351',
    ), $atts));
    
    $return_string = '<div class="opinion-mini__inner-wrap  columnist">';
    $return_string .= '<div class="opinion-mini__img-wrap">';
    $return_string .= get_the_post_thumbnail($columnist_id) . '</div>';
    $return_string .= '<div class="opinion-mini__caption">';
    $return_string .= '<h3 class="title__third  opinion-mini__title">';
    $return_string .= get_the_title($columnist_id) . '</h3>';
    $return_string .= '<p class="opinion-mini__who">' . get_the_excerpt($columnist_id);
    $return_string .= '</p></div><a class="opinion-mini__link" href="/opinions">';
    $return_string .= 'Все мнения</a></div>';
    
    return $return_string;
}

function highlight_text_function($atts, $content = null)
{
    $return_string = '<p class="highlight-text">' . do_shortcode($content) . '</p>';
    return $return_string;
}

function register_shortcodes(){
    add_shortcode('tel-link', 'tel_link_function');
    add_shortcode('topic-article', 'topic_article_function');
    add_shortcode('inset', 'inset_function');
    add_shortcode('facebook-link', 'facebook_link_function');
    add_shortcode('columnist', 'columnist_function');
    add_shortcode('highlight-text', 'highlight_text_function');
    add_shortcode('card-article-link', 'card_article_link_function');
    add_shortcode('info-inset', 'info_inset_function');
    add_shortcode('tag-link', 'tag_link_function');
    add_shortcode('rubrics-link', 'rubrics_link_function');
    add_shortcode('themes-block', 'themes_block_function');
}

add_action( 'init', 'register_shortcodes');

function register_buttons( $buttons ) {
   array_push( $buttons, "topic-article" );
   array_push( $buttons, "tel-link");
   array_push( $buttons, "facebook-link");
   array_push( $buttons, "inset");
   array_push( $buttons, "highlight-text");
   array_push( $buttons, "columnist");
   array_push( $buttons, "card-article-link");
   array_push( $buttons, "info-inset");
   array_push( $buttons, "tag-link");
   array_push( $buttons, "rubrics-link");
   array_push( $buttons, "themes-block");

   return $buttons;
}

function shortcodebuttons_plugin( $plugin_array ) {
   $plugin_array['shortcodebuttons'] = get_template_directory_uri() . '/js/shortcode-buttons.js';
   return $plugin_array;
}

function shortcode_buttons() {

    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
    }
   
    add_filter( 'mce_external_plugins', 'shortcodebuttons_plugin' );
    add_filter( 'mce_buttons_2', 'register_buttons' );
}

add_action('init', 'shortcode_buttons');
