<?php

$big = 999999999;

$nav_args = array (
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link( $big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages,
    'prev_text'  => __('<span><</span>'),
    'next_text'  => __('<span>></span>'),
);

$nav_args_desktop = array (
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link( $big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages,
    'prev_text'  => __('Предыдущая'),
    'next_text'  => __('Следующая'),
);

$banner_archive_pagination_mobile = get_posts(array(
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
            'value' => 'mobile-archive-pagination',
            'compare' => 'LIKE'
        ]
    ]
));

$banner_archive_pagination_desktop = get_posts(array(
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
            'value' => 'desktop-archive-pagination',
            'compare' => 'LIKE'
        ]
    ]
));

$post_number = 3;

global $query_string;
query_posts($query_string . "&orderby=date&order=DESC");

get_header();
?>

<main id="primary" class="site-main
    <?=$banner_archive_pagination_mobile ? 'site-main--mobile-banner' : ''?> 
    <?=$banner_archive_pagination_desktop ? 'site-main--desktop-banner' : ''?> 
    <?=$background_banner ? 'background-banner__page' : ''?> 
    site-main--category">

    <?php if ($banner_popup_inner_mobile && !isset($_COOKIE['ad_zedoinner'])) : ?>
        <div class="banner__popup  banner__popup--mobile  banner__popup--inner-mobile">
            <button id="popupCloseMobileInner" class="banner__popup-close"><span></span></button>
            <?php if (get_field('script', $banner_popup_inner_mobile[0]->ID)) :
                echo get_field('script', $banner_popup_inner_mobile[0]->ID);
                else : ?>
                    <a href="<?=get_field('banner-url', $banner_popup_inner_mobile[0]->ID)?>">
                        <img src="<?=get_field('banner-img', $banner_popup_inner_mobile[0]->ID)?>">
                    </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="container">

        <?php if (have_posts()) : ?>

            <section class="category">
                <h1 class="title  category__title">
                    <?php single_cat_title(); ?>
                </h1>

                <ul class="news-section__list news-section__list--3">

                <?php
                
                while (have_posts()) : the_post(); ?>

                    <li class="news-section__item  news-section__item--3">
                    <?php include(locate_template('template-parts/content-mini-article.php')); ?>
                    </li>
                <?php endwhile;
                 wp_reset_query(); ?>

                </ul>

                <?php if ($wp_query->max_num_pages > 1) : ?>

                    <div class="pagination  pagination--mobile">
                        <?php echo paginate_links($nav_args); ?>
                    </div>

                    <div class="pagination  pagination--desktop">
                        <?php echo paginate_links($nav_args_desktop); ?>
                    </div>
                <?php endif; ?>
            </section>

        <?php else :
            get_template_part( 'template-parts/content', 'none' );
        endif; ?>
    </div>
    

    <?php if ($banner_archive_pagination_mobile) : ?>

        <div class="banner  banner--mobile banner--archive">
            <div class="container">
                <?php if (get_field('script', $banner_archive_pagination_mobile[0]->ID)) :
                    echo get_field('script', $banner_archive_pagination_mobile[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_archive_pagination_mobile[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_archive_pagination_mobile[0]->ID)?>">
                        </a>
                <?php endif; ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($banner_archive_pagination_desktop) : ?>

        <div class="banner  banner--desktop  banner--archive">
            <div class="container">
                <?php if (get_field('script', $banner_archive_pagination_desktop[0]->ID)) :
                    echo get_field('script', $banner_archive_pagination_desktop[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_archive_pagination_desktop[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_archive_pagination_desktop[0]->ID)?>">
                        </a>
                <?php endif; ?>
            </div>
        </div>

    <?php endif; ?>

</main>

<?php

get_footer();
