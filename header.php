<?php
/**
 * The header for our theme
 *
 */

if( is_admin_bar_showing() ) {
    $admin_bar = 'admin';

} else {
    $admin_bar = '';
}

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

       ym(50621746, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
       });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/50621746" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Google Analytics - Global site tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127035104-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-127035104-1');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php wp_head(); ?>
</head>

<body class="<?=$admin_bar;?>" <?php body_class(); ?>>
<?php wp_body_open(); ?>
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
