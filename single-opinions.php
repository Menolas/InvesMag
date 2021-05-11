<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="site-main__inner-wrap">
            <?php while (have_posts()) : the_post();

                get_template_part( 'template-parts/content', 'opinions');

            endwhile; ?>
        </div>
        <?php get_sidebar('opinions'); ?>
    </div>

    <?=get_template_part('template-parts/content', 'news-sections');?>

</main>

<?php
get_footer();