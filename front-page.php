<?php

$main_post = get_posts(array(
    'numberposts' => 1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'main',
));

$top_posts = get_field('to-top', $main_post[0]->ID);

$main_screen_post = $top_posts[0];

$terms = get_the_terms($main_screen_post->ID, 'rubrics');
if($terms) :
    $term = array_shift($terms);
endif;

get_header();

?>

<main id="primary" class="site-main">
    
    <section class="main-news">
        <div class="container">

            <div class="main-news__screen">

                <?php if ($main_screen_post) : ?>
                
                <article class="article-mini">
                    <a class="article-mini__image-wrap" href="<?=get_permalink($main_screen_post);?>">
                        <?php echo get_the_post_thumbnail($main_screen_post->ID); ?>
                    </a>
                    <div class="article-mini__caption">
                      <a class="article-mini__link" href="<?=get_permalink($main_screen_post->ID);?>">
                        <h3 class="article-mini__title">
                            <?=get_the_title($main_screen_post->ID);?>
                        </h3>
                      </a>
                    </div>
                </article>
                <div class="main-news__news-category">
                    <a href="/rubrics/<?=$term->slug;?>">
                        <?=$term->name;?>
                    </a>
                </div>
            </div>
                    
            <?php else :
                get_template_part( 'template-parts/content', 'none' );
            endif; 
            wp_reset_postdata();

            get_sidebar(); ?>
        </div>
    </section>

    <section class="opinions">
        <div class="container">
            <a class="opinions__link" href="/opinions">
                <h2 class="title__secondary  title__secondary--mobile">Мнения</h2>
                <h2 class="title__secondary  title__secondary--desktop">Еще мнения</h2>
            </a>
            <div class="opinions__list"></div>
        </div>
    </section>

    <?=get_template_part('template-parts/content', 'news-sections');?>
</main>

<?php get_footer();
