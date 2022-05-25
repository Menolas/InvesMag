<?php

$current_date1 = date('Y-m-d', time());
$terms = get_terms ([
    'taxonomy' => 'rubrics',
    'exclude' => ['15'],
    'orderby'      => 'description',
    'order'        => 'ASC',
    'hide_empty'    => true,
    'meta_query' => [
        [
            'key' => 'show-in-menu-and-in-section',
            'value' => 1,
        ],
    ],
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

if ($top_posts) {
    foreach ($top_posts as $top_post) {
        $exclude_string .= $top_post->ID . ',';
    }

    $exclude_string = explode(',', $exclude_string);
}

$stocks_args = array(
    'posts_per_page' => 4,
    'post__not_in' => $exclude_string,
    'post_type' => array('opinions', 'main', 'slider', 'cards',),
    'post_status' => 'publish',
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

$banner_inpage_mobile_under = get_posts(array(
    'numberposts' => 1,
    'post_type' => 'partners',
    'meta_query' => [
        [
            'key' => 'switch-banner',
            'value' => 1,
            'compare' => 'LIKE'
        ],
        [
            'key' => 'position',
            'value' => 'mobile-inpage-under',
            'compare' => 'LIKE'
        ]
    ]
));

$banner_desktop_main_bottom = get_posts(array(
    'numberposts' => 1,
    'post_type' => 'partners',
    'meta_query' => [
        [
            'key' => 'switch-banner',
            'value' => 1,
            'compare' => 'LIKE'
        ],
        [
            'key' => 'position',
            'value' => 'desktop-main-bottom ',
            'compare' => 'LIKE'
        ]
    ]
   
));

$banner_desktop_inpage_under = get_posts(array(
    'numberposts' => 1,
    'post_type' => 'partners',
    'meta_query' => [
        [
            'key' => 'switch-banner',
            'value' => 1,
            'compare' => 'LIKE'
        ],
        [
            'key' => 'position',
            'value' => 'desktop-inpage-under',
            'compare' => 'LIKE'
        ]
    ]
));

$banner_main_footer_mobile = get_posts(array(
    'numberposts' => 1,
    'post_type' => 'partners',
    'meta_query' => [
        [
            'key' => 'switch-banner',
            'value' => 1,
            'compare' => 'LIKE'
        ],
        [
            'key' => 'position',
            'value' => 'mobile-main-footer',
            'compare' => 'LIKE'
        ]
    ]
));

?>

<section class="news-section  campaigns">

    <div class="container">
        <?php  $link = get_term_link('stocks', $taxonomy = 'rubrics'); ?>
        <a class="news-section__link" href="<?=$link;?>">
            <h2 class="news-section__title  title__secondary">Акции</h2>
        </a>
        <div class="news-section__list news-section__list--4 campaigns__list">
            <?php
            
            if ($stock_posts->have_posts()) :
                while ($stock_posts->have_posts()) : $stock_posts->the_post(); ?>
                    <div class="news-section__item  campaigns__item  news-section__item--4">
                        <?php get_template_part('template-parts/content', 'mini-article'); ?>
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
    $i = 1;
    foreach($terms as $term):
        $link = get_term_link($term, $taxonomy = 'rubrics');
        $post_number = get_field('number', 'term_' . $term->term_id);

        $query = new WP_Query(array(
            'post_type' => array('main', 'slider', 'cards', 'opinions'),
            'posts_per_page' => $post_number,
            'post__not_in' => $exclude_string,
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'rubrics',
                    'field' => 'slug',
                    'terms' => $term->slug,
                ),
            ),
        ));

        if (!$post_number) {
            $post_number = 3;
        }

        if ($query->post_count > 0) : ?>
            <section class="news-section  <?=$term->slug;?>">
                <div class="container">
                    <a class="news-section__link" href="<?=$link;?>">
                        <h2 class="news-section__title  title__secondary"><?=$term->name;?></h2>
                    </a>
                    <ul class="news-section__list 
                        news-section__list--<?=$post_number;?>  <?=$term->slug;?>__list">
                        
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li class="news-section__item  <?=$term->slug;?>__item  news-section__item--<?=$post_number;?>">
                            <?php get_template_part('template-parts/content', 'mini-article'); ?>
                        </li>
                        <?php endwhile;  
                        wp_reset_postdata();?>
                    </ul>
                </div>
            </section>
            <?php ++$i; ?>

            <?php if(is_front_page() && $i == 3 && $banner_main_footer_mobile) : ?>

                <div class="banner  banner--mobile  banner--main-bottom-mobile banner--main-mobile">
                    <div class="container">
                        <?php if (get_field('script', $banner_main_footer_mobile[0]->ID)) :
                            echo get_field('script', $banner_main_footer_mobile[0]->ID);
                            else : ?>
                                <a href="<?=get_field('banner-url', $banner_main_footer_mobile[0]->ID)?>">
                                    <img src="<?=get_field('banner-img', $banner_main_footer_mobile[0]->ID)?>">
                                </a>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endif; ?>

            <?php if(is_front_page() && $i == 3 && $banner_desktop_main_bottom) : ?>

                <div class="banner  banner--desktop  banner--main-bottom-desktop">
                    <div class="container">
                        <?php if (get_field('script', $banner_desktop_main_bottom[0]->ID)) :
                            echo get_field('script', $banner_desktop_main_bottom[0]->ID);
                            else : ?>
                                <a href="<?=get_field('banner-url', $banner_desktop_main_bottom[0]->ID)?>">
                                    <img src="<?=get_field('banner-img', $banner_desktop_main_bottom[0]->ID)?>">
                                </a>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endif; ?>
            
            <?php if (is_singular(['main', 'opinions', 'slider', 'cards']) && $i == 3 && $banner_inpage_mobile_under) : ?>
                <div class="banner  banner--mobile  banner--inpage-bottom-mobile">
                    <div class="container">
                        <?php if (get_field('script', $banner_inpage_mobile_under[0]->ID)) :
                            echo get_field('script', $banner_inpage_mobile_under[0]->ID);
                            else : ?>
                                <a href="<?=get_field('banner-url', $banner_inpage_mobile_under[0]->ID)?>">
                                    <img src="<?=get_field('banner-img', $banner_inpage_mobile_under[0]->ID)?>">
                                </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (is_singular(['main', 'opinions', 'slider', 'cards']) && $i == 3 && $banner_desktop_inpage_under) : ?>
                <div class="banner  banner--desktop  banner--inpage-bottom-desktop">
                    <div class="container">
                        <?php if (get_field('script', $banner_desktop_inpage_under[0]->ID)) :
                            echo get_field('script', $banner_desktop_inpage_under[0]->ID);
                            else : ?>
                                <a href="<?=get_field('banner-url', $banner_desktop_inpage_under[0]->ID)?>">
                                    <img src="<?=get_field('banner-img', $banner_desktop_inpage_under[0]->ID)?>">
                                </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

        <?php endif; ?>
        
<?php endforeach; endif; ?>
