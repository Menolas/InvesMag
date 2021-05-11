<?php

$terms = get_terms ([
    'taxonomy' => 'rubrics',
    'exclude' => ['38', '15'],
    'orderby'      => 'description',
    'order'        => 'ASC',
]); ?>

<section class="news-section  campaigns">
    <div class="container">
        <?php  $link = get_term_link('stocks', $taxonomy = 'rubrics'); ?>
        <a class="news-section__link" href="<?=$link;?>">
            <h2 class="news-section__title  title__secondary">Акции</h2>
        </a>
        <div class="news-section__list  campaigns__list">
            <?php
            $stocks = new WP_Query(array(
                'post_type' => array('simple-post', 'slider', 'cards'),
                'posts_per_page' => 4,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'rubrics',
                        'field' => 'slug',
                        'terms' => 'stocks'
                    )
                )
            ));
            if ($stocks->have_posts()) :
                while ($stocks->have_posts()) : $stocks->the_post(); ?>
                <div class="news-section__item  campaigns__item  news-section__item--4">
                    <?=get_template_part('template-parts/content', 'mini-article');?>
                </div>
            <?php endwhile;
            wp_reset_postdata();
            else :
            get_template_part( 'template-parts/content', 'none' );
            endif; ?>
        </div>
        
        <div class="paginator  campaigns__paginator">
            <ul>
                <li class="paginator__page  paginator__page--active" data="1"></li>
                <li class="paginator__page" data="2"></li>
                <li class="paginator__page" data="3"></li>
            </ul>
        </div>
        
    </div>
</section>

<?php if($terms):
    foreach($terms as $term):
        $link = get_term_link($term, $taxonomy = 'rubrics'); ?>
        <section class="news-section  <?=$term->slug;?>">
            <div class="container">
                <a class="news-section__link" href="<?=$link;?>">
                    <h2 class="news-section__title  title__secondary"><?=$term->name;?></h2>
                </a>
                <ul class="news-section__list  <?=$term->slug;?>__list">
                    <?php
                    $post_number = 3;
                    
                    if ($term->slug == 'perspectives' || $term->slug == 'special-offers') {
                        $post_number = 2;
                    }
                        
                    $posts = new WP_Query(array(
                        'post_type' => array('simple-post', 'slider', 'cards'),
                        'posts_per_page' => $post_number,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'rubrics',
                                'field' => 'slug',
                                'terms' => $term->slug
                            )
                        )
                    ));

                    if ($posts->have_posts()) :
                        while ($posts->have_posts()) : $posts->the_post(); ?>
                        <li class="news-section__item  <?=$term->slug;?>__item  news-section__item--<?=$post_number;?>">
                            <?=get_template_part('template-parts/content', 'mini-article');?>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata();
                    else :
                    get_template_part( 'template-parts/content', 'none' );
                endif; ?>
                </ul>
            </div>
        </section>
<?php endforeach; endif; ?>
