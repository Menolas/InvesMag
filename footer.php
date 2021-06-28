<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 */

$partners = get_posts(array(
    'numberposts' => 1,
    'post_type' => 'partners2',
    'meta_query' => [
        [
            'key' => 'switch',
            'value' => 1,
            'compare' => 'LIKE'
        ]
    ]
));

?>

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="site-footer__logo">
                <div class="logo">
                    <a href="/">
                        <svg>
                            <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#logo"></use>
                        </svg>
                    </a>
                </div><!-- .site-branding -->
                <p>Cайт про инвестиции в акции</p>
            </div>

            <?php get_template_part('/template-parts/content', 'social');?>

            <?php wp_nav_menu(
                array(
                    'menu' => 'Footer Menu',
                    'theme_location' => 'Footer Menu Location',
                    'menu_class' => 'footer-menu__list'
                )
            );?>

            <?php wp_nav_menu(
                array(
                    'menu' => 'Footer Menu Secondary',
                    'theme_location' => 'Footer Second Menu Location',
                    'menu_class' => 'footer-menu__list'
                )
            );?>

            <p class="site-footer__warning">
                <span>2021 © Investmag.pro</span>&nbsp;&nbsp;&nbsp;18+&nbsp;&nbsp;&nbsp; Информация, размещенная на сайте, не является инвестиционной рекомендацией. Сайт не несет ответственности за возможные убытки в случае инвестирования в финансовые инструменты. Информация, размещенная на сайте, не является инвестиционной рекомендацией.  Сайт не несет ответственности за возможные убытки в случае инвестирования в финансовые инструменты.
            </p>

            <?php if ($partners) : ?>
                
                <div class="partners">
                    <h4 class="partners__title">Партнеры:</h4>
                    <img src="<?=get_field('logo', $partners[0]->ID);?>">
                </div>
            <?php endif; ?>

        </div><!-- .site-info -->
        <button id="to-top" class="to-top-button">Наверх</button>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://yastatic.net/share2/share.js"></script>
</body>
</html>
