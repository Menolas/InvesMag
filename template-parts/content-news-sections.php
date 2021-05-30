<?php

$current_date1 = date('Y-m-d', time());
$terms = get_terms ([
    'taxonomy' => 'rubrics',
    'exclude' => ['38', '15'],
    'orderby'      => 'description',
    'order'        => 'ASC',
    'hide_empty'    => true,
]);

// получаем пост в метаполе которого аккумулируются записи для блока главных новостей на главной странице

$main_post = get_posts(array(
    'numberposts' => 1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'top',
));

//получаем список ID постов ля блока главных новостей на главной

$top_posts = get_field('to-top', $main_post[0]->ID);

$exclude_string = '';

foreach ($top_posts as $top_post) {
    $exclude_string .= $top_post->ID . ',';
}

$exclude_string = explode(',', $exclude_string);

$stocks_args = array(
    'posts_per_page' => 4,
    'post__not_in' => $exclude_string,
    'post_type' => array('main', 'slider', 'card'),
    'orderby'     => 'date',
    'order'       => 'DESC',
    'tax_query' => array(
        array(
            'taxonomy' => 'rubrics',
            'field' => 'slug',
            'terms' => 'stocks'
        )
    ),
);

$stock_posts = new WP_Query($stocks_args);

?>

<section class="news-section  campaigns">
    <div class="container">
        <?php  $link = get_term_link('stocks', $taxonomy = 'rubrics'); ?>
        <a class="news-section__link" href="<?=$link;?>">
            <h2 class="news-section__title  title__secondary">Акции</h2>
        </a>
        <div class="news-section__list  campaigns__list">
            <?php
            
            if ($stock_posts->have_posts()) :
                while ($stock_posts->have_posts()) : $stock_posts->the_post(); ?>
                    <div class="news-section__item  campaigns__item  news-section__item--4">
                        <?=get_template_part('template-parts/content', 'mini-article');?>
                    </div>
            <?php endwhile;
            wp_reset_postdata();
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
        $link = get_term_link($term, $taxonomy = 'rubrics');
        $post_number = get_field('number', 'term_' . $term->term_id);
                    
        if (!$post_number) {
            $post_number = 3;
        }

        $query = new WP_Query(array(
            'post_type' => array('main', 'slider', 'cards'),
            'posts_per_page' => $post_number,
            'post__not_in' => $exclude_string,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'rubrics',
                    'field' => 'slug',
                    'terms' => $term->slug,
                ),
            ),
        ));

        if ($query->have_posts() && $query->post_count > 0) : ?>
            <section class="news-section  <?=$term->slug;?>">
                <div class="container">
                    <a class="news-section__link" href="<?=$link;?>">
                        <h2 class="news-section__title  title__secondary"><?=$term->name;?></h2>
                    </a>
                    <ul class="news-section__list  <?=$term->slug;?>__list">
                        
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li class="news-section__item  <?=$term->slug;?>__item  news-section__item--<?=$post_number;?>">
                            <?=get_template_part('template-parts/content', 'mini-article'); ?>
                        </li>
                        <?php endwhile;

                        wp_reset_postdata();
                       
        endif; ?>
                    </ul>
                </div>
            </section>
<?php endforeach; endif; ?>
