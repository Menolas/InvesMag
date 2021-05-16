<?php

// получаем пост в метаполе которого аккумулируются записи для блока главных новостей на главной странице

$main_post = get_posts(array(
    'numberposts' => 1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'main',
));

//получаем список ID постов ля блока главных новостей на главной

$top_posts = get_field('to-top', $main_post[0]->ID);

// удаляем из массива первый пост, который будет занимать "скрин" позицию на главной странице
$screen_post = array_shift($top_posts);

$top_posts = array_slice($top_posts, 0, 4);

?>

<div class="main-news__side-wrap">
    <a class="main-news__link" href="/news">
        <h2 class="title__secondary  title__secondary--mobile">Новости</h2>
        <h2 class="title__secondary  title__secondary--desktop">Еще новости</h2>
    </a>    
    <ul class="main-news__list">
        <?php if ($top_posts) :
            
            foreach ($top_posts as $post) :

                $terms = get_the_terms($post->ID, 'rubrics');
                if($terms) :
                    $term = array_shift($terms);
                    else: $term = '';
                endif; ?>
                <li class="main-news__item">
                    <a class="article-mini__link" href="<?=get_permalink($post->ID);?>">
                        <h3 class="article-mini__title"><?=get_the_title($post->ID);?></h3>
                    </a>
                    <?php if ($term != '') : ?>
                    <div class="main-news__news-category">
                        <a href="/rubrics/<?=$term->slug;?>">
                            <?=$term->name;?>
                        </a>
                    </div>
                    <?php endif; ?>
                </li>
            <?php endforeach;
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif; ?>
    </ul>
</div>
