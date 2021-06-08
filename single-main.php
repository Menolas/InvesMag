<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();
if ($background_banner) : ?>
    <div class="background-banner">
        <a href="<?=get_field('banner-url', $background_banner[0]->ID)?>">
            <img src="<?=get_field('banner-img', $background_banner[0]->ID)?>">
        </a>
    </div>
<?php endif; ?>
<main id="primary" class="site-main  <?=$background_banner ? 'background-banner__page' : ''?>  site-main--single">
    <div class="container  container--single">
        <div class="site-main__inner-wrap">
        
            <?php while (have_posts()) : the_post();

                get_template_part('template-parts/content', 'main');

            endwhile; ?>
        </div>
        <?php get_sidebar('simple-post'); ?>
    </div>

    <?=get_template_part('template-parts/content', 'news-sections');?>

</main>

<?php
get_footer();
