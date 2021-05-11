<?php
/**
 * The sidebar containing the widget area для страницы "1 мнение"
 *
 */

if (!is_active_sidebar('sidebar-opinions')) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    <?get_template_part('template-parts/section', 'main-news-single'); ?>
    <?php dynamic_sidebar('sidebar-opinions'); ?>
</aside>
