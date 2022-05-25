<?php

/*
Template Name: Front Page Template
*/

session_start();

if (!isset($_COOKIE['ad_zedo'])) { 
    
    setcookie('ad_zedo', 1, time() + 3600, COOKIEPATH, COOKIE_DOMAIN);
}

$main_post = get_posts(array(
    'numberposts' => 1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'top',
));

$top_posts = get_field('to-top', $main_post[0]->ID);

$main_screen_post = $top_posts[0];

$terms = get_the_terms($main_screen_post, 'rubrics');

if($terms) {

    foreach ($terms as $i => $term) {
        if ($term->name === 'Новости') {
            unset($terms[$i]);
        }
    }

    $term = array_shift($terms);

} else {
    
    $term = '';
}

$opinions_args = array(
    'posts_per_page' => 4,
    'post_type' => 'opinions',
    'post_status' => 'publish',
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post__not_in' => $exclude_string,
);

$opinions_args_mobile = array(
    'posts_per_page' => 3,
    'post_type' => 'opinions',
    'post_status' => 'publish',
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post__not_in' => $exclude_string,
);

$opinions = new WP_Query($opinions_args);
$opinions_mobile = new WP_Query($opinions_args_mobile);

get_header();

?>

<?php if ($banner_popup_main_desktop && !isset($_COOKIE['ad_zedo'])) : ?>
    <div class="banner__popup  banner__popup--desktop  banner__popup--main-desktop">
        <div class="container">
            <button id="popupCloseDesktop" class="banner__popup-close"><span></span></button>
            <?php if (get_field('script', $banner_popup_main_desktop[0]->ID)) :
                echo get_field('script', $banner_popup_main_desktop[0]->ID);
                else : ?>
                    <a href="<?=get_field('banner-url', $banner_popup_main_desktop[0]->ID)?>">
                        <img src="<?=get_field('banner-img', $banner_popup_main_desktop[0]->ID)?>">
                    </a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<main id="primary" class="site-main 
<?=$banner_desktop_main_top ? 'banner_desktop_main__page' : ''?> 
<?=$background_banner ? 'background-banner__page' : ''?>">

    <?php if ($banner_popup_main_mobile && !isset($_COOKIE['ad_zedo'])) : ?>
        <div class="banner__popup  banner__popup--mobile  banner__popup--main-mobile">
            
                <button id = "popupCloseMobile" class="banner__popup-close"><span></span></button>
                <?php if (get_field('script', $banner_popup_main_mobile[0]->ID)) :
                    echo get_field('script', $banner_popup_main_mobile[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_popup_main_mobile[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_popup_main_mobile[0]->ID)?>">
                        </a>
                <?php endif; ?>
            
        </div>
    <?php endif; ?>

    <?php if ($banner_desktop_main_top) : ?>

        <div class="banner  banner--desktop  banner--main-top-desktop">
            <div class="container">
                <?php if (get_field('script', $banner_desktop_main_top[0]->ID)) :
                    echo get_field('script', $banner_desktop_main_top[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_desktop_main_top[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_desktop_main_top[0]->ID)?>">
                        </a>
                <?php endif; ?>
            </div>
        </div>

    <?php endif; ?>
    <h1 class="main-header screen-reader-text"
        style="border: 0;clip: rect(1px, 1px, 1px, 1px);clip-path: inset(50%);height: 1px;margin: -1px;overflow: hidden;padding: 0;
        position: absolute;width: 1px;word-wrap: normal !important;">Инвестмаг - журнал об инвестициях</h1>
    <section class="main-news">
        <div class="container">

            <div class="main-news__screen">

                <?php if ($main_screen_post) : ?>
                
                    <article class="article-mini">
                        <a class="article-mini__image-wrap" href="<?=get_permalink($main_screen_post);?>">
                            <picture>
                                <source media="(min-width: 1110px)" width="630">
                                <source media="(min-width: 768px)" 
                                    srcset="<?=get_the_post_thumbnail_url($main_screen_post->ID, 'full');?>"
                                    width="724">
                                <img 
                                    src="<?=get_the_post_thumbnail_url($main_screen_post->ID, 'medium');?>" 
                                    alt="<?=the_title();?>"
                                    width="345" height="226">
                            </picture>
                        </a>
                        <div class="article-mini__caption">
                          <a class="article-mini__link" href="<?=get_permalink($main_screen_post->ID);?>">
                            <h3 class="article-mini__title">
                                <?=get_the_title($main_screen_post->ID);?>
                            </h3>
                          </a>
                        </div>
                    </article>

                    <?php if ($term != '') : ?>
                        <div class="main-news__news-category">
                            <a href="/rubrics/<?=$term->slug;?>">
                                <?=$term->name;?>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php else :
                get_template_part( 'template-parts/content', 'none' );
                endif; 
                wp_reset_postdata(); ?>
                    
            </div>

            <?php if ($banner_main_top_mobile) : ?>

                <div class="banner  banner--mobile  banner--main-top-mobile  banner--main-mobile">
                    <div class="container">
                        <?php if (get_field('script', $banner_main_top_mobile[0]->ID)) :
                            echo get_field('script', $banner_main_top_mobile[0]->ID);
                            else : ?>
                                <a href="<?=get_field('banner-url', $banner_main_top_mobile[0]->ID)?>">
                                    <img src="<?=get_field('banner-img', $banner_main_top_mobile[0]->ID)?>">
                                </a>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endif; ?>

            <?php get_sidebar(); ?>
        </div>
    </section>

    <section class="opinions opinions--mobile">
        <div class="container">
            <a class="opinions__link" href="/opinions">
                <h2 class="title__secondary  title__secondary--mobile">Мнения</h2>
            </a>
        </div>  
        <div class="opinions__list">
            <?php if ($opinions_mobile->have_posts()) :
            $data = 0;
            while ($opinions_mobile->have_posts()) : $opinions_mobile->the_post(); ?>
                <div class="opinions__item">
                    <?=get_template_part('template-parts/content', 'opinions-mini');?>
                </div>
            <?php endwhile; endif;
            wp_reset_postdata(); ?>
        </div>
        
        <ul class="opinions-pagination">
            <li class="opinions-pagination__item active"><span></span></li>
            <li class="opinions-pagination__item"><span></span></li>
            <li class="opinions-pagination__item"><span></span></li>
        </ul>
    </section>

    <section class="opinions opinions--desktop">
        <div class="container">
            <a class="opinions__link" href="/opinions">
                <h2 class="title__secondary  title__secondary--desktop">Еще мнения</h2>
            </a>
            
            <div class="opinions__list">
                <?php if ($opinions->have_posts()) :
                $data = 0;
                while ($opinions->have_posts()) : $opinions->the_post(); ?>
                    <div class="opinions__item">
                        <?=get_template_part('template-parts/content', 'opinions-mini');?>
                    </div>
                <?php endwhile; endif;
                wp_reset_postdata(); ?>
            </div>
            
        </div>
    </section>

    <?php if ($banner_main_center_mobile) : ?>

        <div class="banner  banner--mobile  banner--main-center-mobile  banner--main-mobile">
            <div class="container">
                <?php if (get_field('script', $banner_main_center_mobile[0]->ID)) :
                    echo get_field('script', $banner_main_center_mobile[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_main_center_mobile[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_main_center_mobile[0]->ID)?>">
                        </a>
                <?php endif; ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($banner_desktop_main_center) : ?>

        <div class="banner  banner--desktop  banner--main-center-desktop">
            <div class="container">
                <?php if (get_field('script', $banner_desktop_main_center[0]->ID)) :
                    echo get_field('script', $banner_desktop_main_center[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_desktop_main_center[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_desktop_main_center[0]->ID)?>">
                        </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?=get_template_part('template-parts/content', 'news-sections');?>
</main>

<?php get_footer();
