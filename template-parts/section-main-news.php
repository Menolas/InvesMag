<?php

$main_news_posts = new WP_Query(array(
    'post_type' => 'main',
    'posts_per_page' => 4,
    'offset' => 1,
    //'meta_key' => 'order-in-sidebar',
));

$terms = get_terms ([
    'taxonomy' => 'rubrics',
    'exclude' => ['38'],
    'orderby'      => 'description',
    'order'        => 'ASC',
]);
?>

<div class="main-news__side-wrap">
    <a class="main-news__link" href="/news">
        <h2 class="title__secondary  title__secondary--mobile">Новости</h2>
        <h2 class="title__secondary  title__secondary--desktop">Еще новости</h2>
    </a>    
    <ul class="main-news__list">
        <?php if ($main_news_posts->have_posts()) :
            while ($main_news_posts->have_posts()) : $main_news_posts->the_post(); ?>
                <li class="main-news__item">
                    
                    <a class="article-mini__link" href="<?=get_permalink();?>">
                        <h3 class="article-mini__title"><?=the_title();?></h3>
                    </a>
                    <p class="article-mini__date"><?=get_the_date();?></p>

                    <div class="main-news__news-category">
                        <?=get_the_term_list($post->ID, 'rubrics');?>
                    </div>
                </li>

            <?php endwhile;
            wp_reset_postdata();
            
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif; ?>
    </ul>
</div>
