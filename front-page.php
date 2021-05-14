<?php

$top_posts = get_field('to-top', 893);
$main_screen_post = $top_posts[0];

$terms = get_the_terms($main_screen_post, 'rubrics');
if($terms) :
    $term = array_shift($terms);
endif;

$date1 = get_the_date('Y-m-d', $main_screen_post);
$current_date1 = date('Y-m-d', time());

$article_date = get_article_date($date1, $current_date1);

$opinions_posts = new WP_Query(array(
    'post_type' => 'opinions',
    'posts_per_page' => 4
));

get_header();

?>

<main id="primary" class="site-main">
    
    <section class="main-news">
        <div class="container">

            <div class="main-news__screen">

                <?php if ($main_screen_post) : ?>
                
                <article class="article-mini">
                    <a class="article-mini__image-wrap" href="<?=get_permalink($main_screen_post);?>">
                        <?php echo get_the_post_thumbnail($main_screen_post); ?>
                    </a>
                    <div class="article-mini__caption">
                      <a class="article-mini__link" href="<?=get_permalink($main_screen_post);?>">
                        <h3 class="article-mini__title">
                            <?=get_the_title($main_screen_post);?>
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
