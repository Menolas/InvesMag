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
        'link_url' => '#',
    ), $atts));

    $return_string = '<div class="channel-link  channel-link--info">'.$content;
    $return_string .= ' <a href="'.$link_url.'">'.$link_text.' </a>'.'</div>';
    return $return_string;
}

function topic_article_function($atts)
{
  extract(shortcode_atts(array(
       'page_id' => '#',
    ), $atts));
    
    //$post = get_page_by_title($page_title, $output, array('main', 'slider', 'cards', 'opinions'));

    $return_string = '<div class="topic-article">';
    $return_string .= '<a class="topic-article__img-wrap" href="'.get_permalink($page_id).'">' . get_the_post_thumbnail($page_id) . '</a>';
    $return_string .= '<div class="topic-article__inner-wrap"><span>По теме</span>';
    $return_string .= '<a class="topic-article__header-link" href="'.get_permalink($page_id).'">';
    $return_string .= '<h3>' . get_the_title($page_id) . '</h3></a>';
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
    
    if ($term) {
        $cat_link = get_category_link($term->term_taxonomy_id);

        $return_string = '<a class="tag-link" href="'.$cat_link.'">' . do_shortcode($content) . '</a>';
    } else {
      $return_string = '<a class="tag-link" href="#">' . do_shortcode($content) . '</a>';
    }

    return $return_string;
}

function rubrics_link_function($atts, $content = null)
{
    $term = get_term_by('name', $content, 'rubrics');

    if ($term) {

      $cat_link = get_category_link($term->term_taxonomy_id);

      $return_string = '<a class="rubrics-link" href="'.$cat_link.'">' . do_shortcode($content) . '</a>';
    } else {
      $return_string = '<a class="rubrics-link" href="#">' . do_shortcode($content) . '</a>';
    }
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
    $return_string .= '<h3 id="'. $link_id .'" class="title__third">';
    $return_string .= do_shortcode($content).'</h3></div>';
    return $return_string;
}

function columnist_function($atts)
{
  ob_start();
  
  get_template_part( 'template-parts/content', 'columnist-block');

  return ob_get_clean();
}

function banner_desktop_inpage1_function($atts)
{

  $banner_desktop_inpage1 = get_posts(array(
    'numberposts' => 1,
    'post_type' => 'partners',
    'meta_query' => [
        [
            'key' => 'switch-banner',
            'value' => 1,
            'compare' => 'LIKE'
        ],
        [
            'key' => 'position',
            'value' => 'desktop-inpage1-shotcode',
            'compare' => 'LIKE'
        ]
    ]
   
  ));

  if ($banner_desktop_inpage1) {

    $url = get_field('banner-url', $banner_desktop_inpage1[0]->ID);
    $img = get_field('banner-img', $banner_desktop_inpage1[0]->ID);
    $script = get_field('script', $banner_desktop_inpage1[0]->ID);

    $return_string = '<div class="banner banner--desktop  banner--inpage  banner--inpage1">';

    if ($script) {
        $return_string .= $script;
    } else {
        $return_string .= '<a href="' . $url .'" target="_blank"><img src="' . $img . '"></a>';
    }

    $return_string .= '</div>';
    
    return $return_string;
  }
}

function banner_desktop_inpage2_function($atts)
{

  $banner_desktop_inpage2 = get_posts(array(
      'numberposts' => 1,
      'post_type' => 'partners',
      'meta_query' => [
          [
              'key' => 'switch-banner',
              'value' => 1,
              'compare' => 'LIKE'
          ],
          [
              'key' => 'position',
              'value' => 'desktop-inpage2-shotcode',
              'compare' => 'LIKE'
          ]
      ]
     
  ));

  if ($banner_desktop_inpage2) {

    $url = get_field('banner-url', $banner_desktop_inpage2[0]->ID);
    $img = get_field('banner-img', $banner_desktop_inpage2[0]->ID);
    $script = get_field('script', $banner_desktop_inpage2[0]->ID);

    $return_string = '<div class="banner banner--desktop  banner--inpage  banner--inpage2">';

    if ($script) {
        $return_string .= $script;
    } else {
        $return_string .= '<a href="' . $url .'" target="_blank"><img src="' . $img . '"></a>';
    }

    $return_string .= '</div>';
    
    return $return_string;
  }
}

function banner_desktop_inpage3_function($atts)
{

  $banner_desktop_inpage3 = get_posts(array(
      'numberposts' => 1,
      'post_type' => 'partners',
      'meta_query' => [
          [
              'key' => 'switch-banner',
              'value' => 1,
              'compare' => 'LIKE'
          ],
          [
              'key' => 'position',
              'value' => 'desktop-inpage3-shotcode',
              'compare' => 'LIKE'
          ]
      ]
  ));

  if ($banner_desktop_inpage3) {

    $url = get_field('banner-url', $banner_desktop_inpage3[0]->ID);
    $img = get_field('banner-img', $banner_desktop_inpage3[0]->ID);
    $script = get_field('script', $banner_desktop_inpage3[0]->ID);

    $return_string = '<div class="banner banner--desktop  banner--inpage  banner--inpage3">';

    if ($script) {
        $return_string .= $script;
    } else {
        $return_string .= '<a href="' . $url .'" target="_blank"><img src="' . $img . '"></a>';
    }

    $return_string .= '</div>';
    
    return $return_string;
  } 
}

function banner_mobile_inpage1_function($atts)
{

  $banner_mobile_inpage1 = get_posts(array(
      'numberposts' => 1,
      'post_type' => 'partners',
      'meta_query' => [
          [
              'key' => 'switch-banner',
              'value' => 1,
              'compare' => 'LIKE'
          ],
          [
              'key' => 'position',
              'value' => 'mobile-inpage-shortcode1',
              'compare' => 'LIKE'
          ]
      ]
  ));

  if ($banner_mobile_inpage1) {

    $url = get_field('banner-url', $banner_mobile_inpage1[0]->ID);
    $img = get_field('banner-img', $banner_mobile_inpage1[0]->ID);
    $script = get_field('script', $banner_mobile_inpage1[0]->ID);

    $return_string = '<div class="banner banner--mobile  banner--inpage  mobile--inpage1">';

    if ($script) {
        $return_string .= $script;
    } else {
        $return_string .= '<a href="' . $url .'" target="_blank"><img src="' . $img . '"></a>';
    }

    $return_string .= '</div>';
    
    return $return_string;
  } 
}

function banner_mobile_inpage2_function($atts)
{

  $banner_mobile_inpage2 = get_posts(array(
      'numberposts' => 1,
      'post_type' => 'partners',
      'meta_query' => [
          [
              'key' => 'switch-banner',
              'value' => 1,
              'compare' => 'LIKE'
          ],
          [
              'key' => 'position',
              'value' => 'mobile-inpage-shortcode2',
              'compare' => 'LIKE'
          ]
      ]
  ));

  if ($banner_mobile_inpage2) {

    $url = get_field('banner-url', $banner_mobile_inpage2[0]->ID);
    $img = get_field('banner-img', $banner_mobile_inpage2[0]->ID);
    $script = get_field('script', $banner_mobile_inpage2[0]->ID);

    $return_string = '<div class="banner banner--mobile  banner--inpage  mobile--inpage2">';

    if ($script) {
        $return_string .= $script;
    } else {
        $return_string .= '<a href="' . $url .'" target="_blank"><img src="' . $img . '"></a>';
    }

    $return_string .= '</div>';
    
    return $return_string;
  } 
}

function banner_mobile_inpage3_function($atts)
{

  $banner_mobile_inpage3 = get_posts(array(
      'numberposts' => 1,
      'post_type' => 'partners',
      'meta_query' => [
          [
              'key' => 'switch-banner',
              'value' => 1,
              'compare' => 'LIKE'
          ],
          [
              'key' => 'position',
              'value' => 'mobile-inpage-shortcode3',
              'compare' => 'LIKE'
          ]
      ]
  ));

  if ($banner_mobile_inpage3) {

    $url = get_field('banner-url', $banner_mobile_inpage3[0]->ID);
    $img = get_field('banner-img', $banner_mobile_inpage3[0]->ID);
    $script = get_field('script', $banner_mobile_inpage3[0]->ID);

    $return_string = '<div class="banner banner--mobile  banner--inpage  mobile--inpage3">';

    if ($script) {
        $return_string .= $script;
    } else {
        $return_string .= '<a href="' . $url .'" target="_blank"><img src="' . $img . '"></a>';
    }

    $return_string .= '</div>';
    
    return $return_string;
  } 
}

function register_shortcodes(){
    add_shortcode('tel-link', 'tel_link_function');
    add_shortcode('topic-article', 'topic_article_function');
    add_shortcode('inset', 'inset_function');
    add_shortcode('facebook-link', 'facebook_link_function');
    add_shortcode('columnist', 'columnist_function');
    add_shortcode('card-article-link', 'card_article_link_function');
    add_shortcode('info-inset', 'info_inset_function');
    add_shortcode('tag-link', 'tag_link_function');
    add_shortcode('rubrics-link', 'rubrics_link_function');
    add_shortcode('themes-block', 'themes_block_function');
    add_shortcode('banner_desktop_inpage1', 'banner_desktop_inpage1_function');
    add_shortcode('banner_desktop_inpage2', 'banner_desktop_inpage2_function');
    add_shortcode('banner_desktop_inpage3', 'banner_desktop_inpage3_function');
    add_shortcode('banner_mobile_inpage1', 'banner_mobile_inpage1_function');
    add_shortcode('banner_mobile_inpage2', 'banner_mobile_inpage2_function');
    add_shortcode('banner_mobile_inpage3', 'banner_mobile_inpage3_function');
}

add_action( 'init', 'register_shortcodes');

function register_buttons( $buttons ) {
   array_push($buttons, "topic-article");
   array_push($buttons, "tel-link");
   array_push($buttons, "facebook-link");
   array_push($buttons, "inset");
   array_push($buttons, "highlight-text");
   array_push($buttons, "columnist");
   array_push($buttons, "card-article-link");
   array_push($buttons, "info-inset");
   array_push($buttons, "tag-link");
   array_push($buttons, "rubrics-link");
   array_push($buttons, "themes-block");
   array_push($buttons, "banner_desktop_inpage1");
   array_push($buttons, "banner_desktop_inpage2");
   array_push($buttons, "banner_desktop_inpage3");
   array_push($buttons, "banner_mobile_inpage1");
   array_push($buttons, "banner_mobile_inpage2");
   array_push($buttons, "banner_mobile_inpage3");

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

add_filter('mce_buttons', 'mce_page_break');
function mce_page_break( $mce_buttons ){
  $pos = array_search('wp_more', $mce_buttons, true );
  if( $pos !== false ){
    $buttons     = array_slice( $mce_buttons, 0, $pos + 1 );
    $buttons[]   = 'wp_page';
    $mce_buttons = array_merge( $buttons, array_slice($mce_buttons, $pos + 1) );
  }
  return $mce_buttons;
}
