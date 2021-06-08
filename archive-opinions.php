<?php

$nav_args = array (
    'prev_text'  => __('<span><</span>'),
    'next_text'  => __('<span>></span>'),
);

$nav_args_desktop = array (
    'prev_text'  => __('Предыдущая'),
    'next_text'  => __('Следующая'),
);

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

            <?php if (have_posts()) : ?>

                <section class="category">
                    <h1 class="title  category__title">Мнения</h1>

                    <ul class="news-section__list">
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="news-section__item  news-section__item--3">
                        <?php get_template_part('template-parts/content', 'mini-article'); ?>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                    <div class="pagination--mobile">
                        <?php the_posts_pagination($nav_args); ?>
                    </div>

                    <div class="pagination--desktop">
                        <?php the_posts_pagination($nav_args_desktop); ?>
                    </div>
                </section>

            <?php else :
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
        </div>
    </main>

<?php

get_footer();
