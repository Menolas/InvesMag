<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 */

$partners = new WP_Query(array(
    'post_type' => 'partners',
    'tag' => 'show-in-footer'
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

            <?php if ($partners->have_posts()) :
                while ($partners->have_posts()) : $partners->the_post(); ?>
                    <div class="partners">
                        <h4 class="partners__title">Партнеры:</h4>
                        <?php if(has_post_thumbnail()):?>
                            <img src="<?=the_post_thumbnail_url('blog-large');?>" alt="<?=the_title();?>">
                        <?php endif;?>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); endif; ?>

                <button id="toTop" class="to-top-button">Наверх</button>
            
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://yastatic.net/share2/share.js"></script>
</body>
</html>
