<?php
/**
 * The sidebar containing the main widget area
 *
 */

if ( ! is_active_sidebar('sidebar-platform')) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    
    <?php dynamic_sidebar('sidebar-platform'); ?>
</aside>
