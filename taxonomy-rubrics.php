<?php

$big = 999999999;

$nav_args = array (
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link( $big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages,
    'prev_text'  => __('<span><</span>'),
    'next_text'  => __('<span>></span>'),
);

$nav_args_desktop = array (
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link( $big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages,
    'prev_text'  => __('Предыдущая'),
    'next_text'  => __('Следующая'),
);

global $query_string;
query_posts($query_string . "&orderby=date&order=DESC");

get_header();

    if ($background_banner) : ?>
        <div class="background-banner">
            <a href="<?=get_field('banner-url', $background_banner[0]->ID)?>">
                <img src="<?=get_field('banner-img', $background_banner[0]->ID)?>">
            </a>
        </div>
    <?php endif; ?>
    <main id="primary" class="site-main  <?=$background_banner ? 'background-banner__page' : ''?>  site-main--category">
        <div class="container">

            <?php if (have_posts()) : ?>

                <section class="category">
                    <h1 class="title  category__title">
                        <?php single_cat_title(); ?>
                    </h1>

                    <ul class="news-section__list">

                    <?php
                    
                    while (have_posts()) : the_post(); ?>

                        <li class="news-section__item  news-section__item--3">
                        <?php get_template_part('template-parts/content', 'mini-article'); ?>
                        </li>
                    <?php endwhile;
                     wp_reset_query(); ?>

                    </ul>

                    <?php if ($wp_query->max_num_pages > 1) : ?>

                        <div class="pagination  pagination--mobile">
                            <?php echo paginate_links($nav_args); ?>
                        </div>

                        <div class="pagination  pagination--desktop">
                            <?php echo paginate_links($nav_args_desktop); ?>
                        </div>
                    <?php endif; ?>
                </section>

            <?php else :
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
        </div>
    </main>

<?php

get_footer();
