<?php
/**
 * The sidebar containing the main widget area
 *
 */

if ( ! is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area front-page-sidebar">
    <?get_template_part( 'template-parts/section', 'main-news' ); ?>
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>
