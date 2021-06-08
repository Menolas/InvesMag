<?php

get_header();

if ($background_banner) : ?>
    <div class="background-banner">
        <a href="<?=get_field('banner-url', $background_banner[0]->ID)?>">
            <img src="<?=get_field('banner-img', $background_banner[0]->ID)?>">
        </a>
    </div>
<?php endif; ?>

    <main id="primary" class="site-main  <?=$background_banner ? 'background-banner__page' : ''?>">

        <div class="container">
            <section class="error-404 not-found">

                <p class="error-404__text">Страница не найдена</p>

                <span>404</span>

                <a class="error-404__link" href="/">Перейти на главную страницу</a>

            </section>
        </div>

    </main>

<?php

get_footer();
