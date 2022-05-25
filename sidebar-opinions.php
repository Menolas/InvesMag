<?php
/**
 * The sidebar containing the widget area для страницы "1 мнение"
 *
 */

$banner_sidebar = get_posts(array(
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
            'value' => 'sidebar',
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

<aside id="sidebar-opinions" class="widget-area  sidebar-opinions  sidebar-article">
    <?get_template_part('template-parts/section', 'main-news-single'); ?>

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

    <?php if ($banner_sidebar) : ?>

        <div class="banner  banner--sidebar">
                <h4 class="banner__title">Реклама</h4>
                <?php if (get_field('script', $banner_sidebar[0]->ID)) :
                    echo get_field('script', $banner_sidebar[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_sidebar[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_sidebar[0]->ID)?>">
                        </a>
                <?php endif; ?>
            
        </div>

    <?php endif; ?>

</aside>
