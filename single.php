<?php
/**
 * The template for displaying all single posts
 *
 */
if (get_field('post_kind')) {
    $post_kind = get_field('post_kind');
} else {
    $post_kind = get_post_type();
}

get_header();
?>

<main id="primary" class="site-main  site-main--single">
    <div class="container  container--single">
        <div class="site-main__inner-wrap">
        
            <?php while (have_posts()) : the_post();

                get_template_part('template-parts/content', $post_kind);

            endwhile; ?>
        </div>
        <?php get_sidebar('simple-post'); ?>
    </div>

    <?=get_template_part('template-parts/content', 'news-sections');?>

</main>

<?php
get_footer();
