<?php
/**
 * The sidebar containing the widget area для страницы "1 мнение"
 *
 */
?>

<aside id="sidebar-opinions" class="widget-area  sidebar-opinions  sidebar-article">
    <?get_template_part('template-parts/section', 'main-news-single'); ?>
    <?php dynamic_sidebar('sidebar-opinions'); ?>
</aside>
