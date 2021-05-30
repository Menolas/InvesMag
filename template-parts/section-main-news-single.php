<?php

$main_news_posts = new WP_Query(array(
    'post_type' => ['main', 'opinions', 'main', 'top', 'slider'],
    'posts_per_page' => 5
));

?>

<div class="main-news__side-wrap main-news--single-sidebar">
    <a class="main-news__link" href="/rubrics/news">
        <h2 class="title__secondary">Новости</h2>
    </a>    
    <ul class="main-news__list">
        
        <?php while ($main_news_posts->have_posts()) : $main_news_posts->the_post(); ?>
            <li class="main-news__item">

                <?php $terms = get_the_terms($post->ID, 'rubrics');

                if($terms) {
                  
                    foreach ($terms as $i => $term) {
                      if ($term->name === 'Новости') {
                        unset($terms[$i]);
                      }
                    }

                    $term = array_shift($terms);
                } ?>
                
                <a class="article-mini__link" href="<?=get_permalink();?>">
                    <h3 class="article-mini__title"><?=the_title();?></h3>
                </a>
                <?php if ($term) : ?>
                    <a class="main-news__item-category" href="/rubrics/<?=$term->slug;?>">
                        <?=$term->name;?>
                    </a>
                <?php endif; ?>
            </li>
        <?php endwhile;
        wp_reset_postdata();?>
    </ul>
</div>
