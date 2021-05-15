<?php
/**
 * The header for our theme
 *
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'investmag' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="logo">
                <a href="/">
                    <svg>
                        <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#logo"></use>
                    </svg>
                </a>
            </div><!-- .site-branding -->

            <button class="site-header__notification  sub-dialog-btn allow_btn">
                <svg>
                    <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#notification"></use>
                </svg>
            </button>

            <button id ="search_btn" class="searching-form__btn  searching-form__btn--mobile">
                <span></span>
                <svg>
                    <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#search"></use>
                </svg>
            </button>
            <div id="searching-form__popup" class="searching-form__popup  dlg-modal dlg-modal-fade">
                <?php get_search_form();?>
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
        <div id="notify" class="notify-popup">
            <span class="notify-popup__icon">
                <svg>
                    <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#notification"></use>
                </svg>
            </span>
            <p class="notify-popup__text">Вы подписались на уведомления сайта Investmag.pro</p>
        </div>

        <div id="stop-notify" class="notify-popup  notify-popup--stop">
            <span class="notify-popup__icon">
                <svg>
                    <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#stopnotify"></use>
                </svg>
            </span>
            <p class="notify-popup__text">Вы отписались от уведомлений сайта Investmag.pro</p>
        </div>
    </header>
