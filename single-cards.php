<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();
?>

<main id="primary" class="site-main  site-main--single">
    <div class="container  container--single">
        <div class="site-main__inner-wrap">
        
            <?php while (have_posts()) : the_post();

                get_template_part('template-parts/content', 'card');

            endwhile; ?>
        </div>
        <aside class="widget-area  card-aside">
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
