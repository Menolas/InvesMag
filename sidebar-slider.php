<?php
/**
 * The sidebar containing the main widget area
 *
 */

$opinions_posts = new WP_Query(array(
    'post_type' => 'opinions',
    'posts_per_page' => 3,
));

$banner_sidebar_slider = get_posts(array(
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
            'value' => 'sidebar-slider',
            'compare' => 'LIKE'
        ]
    ]
));

$banner_inpage_mobile_sidebar = get_posts(array(
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
            'value' => 'mobile-inpage-sidebar',
            'compare' => 'LIKE'
        ]
    ]
));

?>

<aside id="sidebar-article" class="widget-area  sidebar-article">
    <?get_template_part('template-parts/section', 'main-news-single'); ?>
    <section class="opinions opinions-sidebar">
        <a class="opinions__link" href="/opinions">
            <h2 class="title__secondary">Мнения</h2>
        </a>
        <div class="opinions-sidebar__list">
            <?php while ($opinions_posts->have_posts()) : $opinions_posts->the_post(); ?>
                <div class="opinions__item">
                    <?=get_template_part('template-parts/content', 'opinions-mini');?>
                </div>
            <?php endwhile;
            wp_reset_postdata();?>
        </div>
    </section>

    <?php if ($banner_inpage_mobile_sidebar) : ?>

        <div class="banner  banner--mobile  banner--sidebar-inpage-mobile">
                
                <?php if (get_field('script', $banner_inpage_mobile_sidebar[0]->ID)) :
                    echo get_field('script', $banner_inpage_mobile_sidebar[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_inpage_mobile_sidebar[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_inpage_mobile_sidebar[0]->ID)?>">
                        </a>
                <?php endif; ?>
            
        </div>

    <?php endif; ?>

    <?php if ($banner_sidebar_slider) : ?>

        <div class="banner  banner--sidebar">
                <h4 class="banner__title">Реклама</h4>
                <?php if (get_field('script', $banner_sidebar_slider[0]->ID)) :
                    echo get_field('script', $banner_sidebar_slider[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_sidebar_slider[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_sidebar_slider[0]->ID)?>">
                        </a>
                <?php endif; ?>
            
        </div>

    <?php endif; ?>

</aside>
