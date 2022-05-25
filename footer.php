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
                <p>Журнал про инвестиции в акции</p>
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
                    <img src="<?=get_field('logo', $partners[0]->ID);?>" width="118" height="19">
                </div>
            <?php endif; ?>

        </div><!-- .site-info -->
        <button id="to-top" class="to-top-button">Наверх</button>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://yastatic.net/share2/share.js"></script>
</body>
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
</html>
