<?php

$nav_args = array (
'prev_text'  => __('<'),
    'next_text'  => __('>'),
);

$nav_args_desktop = array (
'prev_text'  => __('< Предыдущая'),
    'next_text'  => __('Следующая >'),
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
            <section class="category">

                <?php if (have_posts()) : ?>
                    <h1 class="title  category__title"><?=single_tag_title();?></h1>

                    <ul class="news-section__list">

                    <?php while (have_posts()) : the_post(); ?>
                        <li class="news-section__item">
                        <?php get_template_part('template-parts/content', 'mini-article'); ?>
                        </li>
                    <?php endwhile; ?>
                    </ul>

                    <?php if ($wp_query->max_num_pages > 1) : ?>
                        <div class="pagination--mobile">
                            <?php the_posts_pagination($nav_args); ?>
                        </div>

                        <div class="pagination--desktop">
                            <?php the_posts_pagination($nav_args_desktop); ?>
                        </div>
                    <?php endif; ?>
                <?php else :
                    get_template_part( 'template-parts/content', 'none' );
                endif; ?>
            </section>
        </div>
    </main>

<?php

get_footer();
