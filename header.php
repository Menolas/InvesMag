<?php
/**
 * The header for our theme
 *
 */ 

$background_banner = get_posts(array(
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
            'value' => 'background',
            'compare' => 'LIKE'
        ]
    ]
   
));

if( is_admin_bar_showing() ) {
    $admin_bar = 'admin';

} else {
    $admin_bar = '';
}

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php wp_head(); ?>
    
    <!-- Яндекс.Вебмастер -->
    <meta name="yandex-verification" content="17c2c754948a8846" />

    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '553033485829826');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=553033485829826&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->

</head>

<body class="<?=$admin_bar;?>" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wptime-plugin-preloader"></div>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'investmag' ); ?></a>

    <header id="masthead" class="site-header  <?=$admin_bar;?>">
        <div class="container">
            <div class="logo">
                <a href="/">
                    <svg>
                        <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#logo"></use>
                    </svg>
                </a>
            </div>

            <!--notify -->

            <button id ="search_btn" class="searching-form__btn  searching-form__btn--mobile">
                <span></span>
                <svg>
                    <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#search"></use>
                </svg>
            </button>
            <div id="searching-form__popup" class="searching-form__popup  dlg-modal dlg-modal-fade">
                <div class="container">
                    <button class="searching-form__close">
                        <span></span>
                    </button>
                    <?php get_search_form();?>
                </div>
            </div>

            <button class="menu-toggle">
                <span></span>
            </button>

            <nav id="site-navigation" class="main-navigation">

                <?php
                    $menu_name = 'menu-1';
                    $locations = get_nav_menu_locations();
                    if ($locations && isset($locations[$menu_name])) {

                        $menu_items = wp_get_nav_menu_items($locations[$menu_name]);
                        $menu_list = '<ul id="menu-' . $menu_name . '">';

                        foreach ($menu_items as $menu_item) {
                            $current = ($_SERVER['REQUEST_URI'] == parse_url($menu_item->url, PHP_URL_PATH)) ? 'current': '';

                            $menu_list .= '<li class="' . $current . '"><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
                        }

                        $menu_list .= '</ul>';
                        echo $menu_list;
                } ?>

                <?php get_template_part('/template-parts/content', 'news-categories');?>

                <?php wp_nav_menu(
                    array(
                        'menu' => 'Mobile Small Menu',
                        'theme_location' => 'Mobile Small Menu Location',
                        'menu_class' => 'mobile-menu__list'
                    )
                ); ?>

                <?php get_template_part('/template-parts/content', 'social');?>
            </nav><!-- #site-navigation -->
        </div>
        <div class="site-header__bottom">
            <div class="container">
                <?php get_template_part('/template-parts/content', 'news-categories');?>
                <button id="search_btn" class="searching-form__btn  searching-form__btn--desktop">
                    <span></span>
                    <svg>
                        <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#search"></use>
                    </svg>
                </button>
            </div>
        </div>
        <div class="tags-menu  dlg-modal dlg-modal-fade">
            <div class="container">
                <?php wp_nav_menu(
                    array(
                        'menu' => 'Tags List Menu',
                        'theme_location' => 'Secondary Menu',
                        'menu_class' => 'tags-menu__list'
                    )
                ); ?>
                <a class="tags-menu__link" href="/themes">ВСЕ ТЕМЫ</a>
            </div>
        </div>
    </header>

    <?php if ($background_banner) : ?>
        <div class="background-banner">
            <a href="<?=get_field('banner-url', $background_banner[0]->ID)?>">
                <img src="<?=get_field('banner-img', $background_banner[0]->ID)?>">
            </a>
        </div>
    <?php endif; ?>
