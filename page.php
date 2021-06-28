<?php
/**
 * The template for displaying all pages
 *
 */

get_header();
?>

<?php if ($banner_popup_inner_desktop) : ?>
    <div class="banner__popup  banner__popup--desktop">
        <div class="container">
            <button class="banner__popup-close"><span></span></button>
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

<main id="primary" class="site-main  <?=$background_banner ? 'background-banner__page' : ''?>">

    <?php if ($banner_popup_inner_mobile) : ?>
        <div class="banner__popup  banner__popup--mobile">
            <button class="banner__popup-close"><span></span></button>
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
        <div class="site-main__inner-wrap">
            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', 'page' );

            endwhile;
            ?>
        </div>
    </div>

</main>

<?php
get_footer();
