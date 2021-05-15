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
?>

    <main id="primary" class="site-main">
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
