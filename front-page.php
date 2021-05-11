<?php

$main_screen_post = new WP_Query(array(
    'post_type' => 'main',
    'posts_per_page' => 1,
));

$opinions_posts = new WP_Query(array(
    'post_type' => 'opinions',
    'posts_per_page' => 4
));

get_header();

?>

<main id="primary" class="site-main">
    
    <section class="main-news">
        <div class="container">
            <?php if ($main_screen_post->have_posts()) :
                while ($main_screen_post->have_posts()) : $main_screen_post->the_post(); ?>
                    <div class="main-news__screen">
                        <?=get_template_part('template-parts/content', 'mini-article');?>
                        <div class="main-news__news-category">
                            <?=get_the_term_list($post->ID, 'rubrics');?>
                        </div>
                    </div>
                    <?php endwhile;
                    wp_reset_postdata();
                    else :
                        get_template_part( 'template-parts/content', 'none' );
                    endif; ?>
            <?php get_sidebar(); ?>
        </div>
    </section>

    <section class="opinions">
        <div class="container">
            <a class="opinions__link" href="/opinions">
                <h2 class="title__secondary  title__secondary--mobile">Мнения</h2>
                <h2 class="title__secondary  title__secondary--desktop">Еще мнения</h2>
            </a>
            <div class="opinions__list">
                <?php if ($opinions_posts->have_posts()) :
                    while ($opinions_posts->have_posts()) : $opinions_posts->the_post(); ?>
                        <div class="opinions__item">
                            <?=get_template_part('template-parts/content', 'opinions-mini');?>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                    else :
                        get_template_part( 'template-parts/content', 'none' );
                    endif; ?>
            </div>
        </div>
    </section>

    <?=get_template_part('template-parts/content', 'news-sections');?>
</main>

<?php get_footer();
