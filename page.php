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
    <main id="primary" class="site-main  <?=$background_banner ? 'background-banner__page' : ''?>">
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
