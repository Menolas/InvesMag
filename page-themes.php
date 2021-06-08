<?php
/**
 * The template for displaying all pages
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
    <main class="site-main  <?=$background_banner ? 'background-banner__page' : ''?>  themes">
        <div class="container">
                <?php
                while ( have_posts() ) : the_post();

                    the_title('<h1 class="entry-title">', '</h1>'); ?>

                    <div class="entry-content">

                        <?php the_content(); ?>
                    </div>

                <?php endwhile; ?>
        </div>

    </main>

<?php
get_footer();
