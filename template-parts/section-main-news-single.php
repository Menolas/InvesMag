<?php

$main_post = get_posts(array(
    'numberposts' => 1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'top',
));

$top_posts = get_field('to-top', $main_post[0]->ID);
$top_posts = array_slice($top_posts, 0, 5);

?>

<div class="main-news__side-wrap main-news--single-sidebar">
    <a class="main-news__link" href="/rubrics/news">
        <h2 class="title__secondary">Новости</h2>
    </a>    
    <ul class="main-news__list">
        
        <?php if ($top_posts) :
            foreach ($top_posts as $top_post) : ?>
            
                <li class="main-news__item">
                    
                    <a class="article-mini__link" href="<?=get_permalink($top_post->ID);?>">
                        <h3 class="article-mini__title"><?=get_the_title($top_post->ID);?></h3>
                    </a>

                    <?php $terms = get_the_terms($top_post->ID, 'rubrics');

                    if($terms) :
                        foreach ($terms as $i => $term) :
                          if ($term->name === 'Новости') :
                            unset($terms[$i]);
                          endif;
                        endforeach;
                        $term = array_shift($terms);
                        if ($term) : ?>
                            <a class="main-news__item-category" href="/rubrics/<?=$term->slug;?>">
                                <?=$term->name;?>
                            </a>
                    <?php endif; endif; ?>
                   
                </li>
        <?php endforeach; endif; 
        wp_reset_postdata();?>
    </ul>
</div>
