<?php
/**
 * The template for displaying all single posts
 *
 */

if (!isset($_COOKIE['ad_zedo'])) { 
   
   setcookie('ad_zedo', 1,  time() + 3600, COOKIEPATH, COOKIE_DOMAIN);
}

get_header();

?>

<?php if ($banner_popup_inner_desktop && !isset($_COOKIE['ad_zedo'])) : ?>
    <div class="banner__popup  banner__popup--desktop  banner__popup--inner-desktop">
        <div class="container">
            <button id="popupCloseDesktopInner" class="banner__popup-close"><span></span></button>
            <?php if (get_field('script', $banner_popup_inner_desktop[0]->ID)) :
                echo get_field('script', $banner_popup_inner_desktop[0]->ID);
                else : ?>
                    <a href="<?=get_field('banner-url', $banner_popup_inner_desktop[0]->ID)?>">
                        <img src="<?=get_field('banner-img', $banner_popup_inner_desktop[0]->ID)?>">
                    </a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<main id="primary" class="site-main site-main--card
<?=$banner_inpage_mobile_top ? 'site-main--single-mobile-banner' : ''?> 
<?=$banner_desktop_inpage_top ? 'banner_desktop_main__page' : ''?> 
<?=$background_banner ? 'background-banner__page' : ''?>  site-main--single">

    <?php if ($banner_popup_inner_mobile && !isset($_COOKIE['ad_zedo'])) : ?>
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

    <?php if ($banner_inpage_mobile_top) : ?>

        <div class="banner  banner--mobile  banner--inpage-top-mobile">
            <div class="container">
                <?php if (get_field('script', $banner_inpage_mobile_top[0]->ID)) :
                    echo get_field('script', $banner_inpage_mobile_top[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_inpage_mobile_top[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_inpage_mobile_top[0]->ID)?>">
                        </a>
                <?php endif; ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($banner_desktop_inpage_top) : ?>

        <div class="banner  banner--desktop  banner--inpage-top-desktop">
            <div class="container">
                <?php if (get_field('script', $banner_desktop_inpage_top[0]->ID)) :
                    echo get_field('script', $banner_desktop_inpage_top[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_desktop_inpage_top[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_desktop_inpage_top[0]->ID)?>">
                        </a>
                <?php endif; ?>
            </div>
        </div>

    <?php endif; ?>

    <div class="container  container--single">
        <div class="site-main__inner-wrap">
        
            <?php while (have_posts()) : the_post();

                get_template_part('template-parts/content', 'card');

            endwhile; ?>
        </div>
        <?php get_sidebar('main'); ?>
        <!-- <aside class="widget-area  card-aside"> -->
        </aside>
    </div>

    <?=get_template_part('template-parts/content', 'news-sections');?>

    <template>
        <div class="aside-link">
            <span></span>
            <a href="#"></a>
        </div>
    </template>

</main>

<?php
get_footer();
