<?php

get_header();

?>

<main id="primary" class="site-main  <?=$background_banner ? 'background-banner__page' : ''?>  platform-page">
    <div class="container">
        <div class="site-main__inner-wrap">
            <?php
            while (have_posts()) : the_post(); ?>
                <article class="platform">

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                
            <?php endwhile; ?>
        </div>
        <?php get_sidebar('platform'); ?>
    </div>
</main>

<?php
get_footer();
