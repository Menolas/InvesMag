<?php
/**
 * The sidebar containing the main widget area
 *
 */

$opinions_posts = new WP_Query(array(
    'post_type' => 'opinions',
    'posts_per_page' => 3,
));

if ( ! is_active_sidebar( 'sidebar-article' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    <?get_template_part('template-parts/section', 'main-news-single'); ?>
    <section class="opinions opinions-sidebar">
        <a class="opinions__link" href="/opinions">
            <h2 class="title__secondary">Мнения</h2>
        </a>
        <div class="opinions__list  opinions-sidebar__list">
            <?php while ($opinions_posts->have_posts()) : $opinions_posts->the_post(); ?>
                <div class="opinions__item">
                    <?=get_template_part('template-parts/content', 'opinions-mini');?>
                </div>
            <?php endwhile;
            wp_reset_postdata();?>
        </div>
    </section>
    <?php dynamic_sidebar('sidebar-article'); ?>
</aside>
