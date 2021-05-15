<?php

$top_posts = get_field('to-top', 893);
$screen_post = array_shift($top_posts);

?>

<div class="main-news__side-wrap">
    <a class="main-news__link" href="/news">
        <h2 class="title__secondary  title__secondary--mobile">Новости</h2>
        <h2 class="title__secondary  title__secondary--desktop">Еще новости</h2>
    </a>    
    <ul class="main-news__list">
        <?php if ($top_posts) :
            foreach ($top_posts as $top_post) :

                $terms = get_the_terms($top_post, 'rubrics');
                if($terms) :
                    $term = array_shift($terms);
                    else: $term = '';
                endif; ?>
                <li class="main-news__item">
                    <a class="article-mini__link" href="<?=get_permalink($top_post);?>">
                        <h3 class="article-mini__title"><?=get_the_title($top_post);?></h3>
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
