<?php

get_header();
?>

    <main id="primary" class="site-main  platform-page">
        <div class="container">
            <div class="site-main__inner-wrap">
                <?php
                while (have_posts()) : the_post(); ?>
                    <article class="platform">
                        <?php the_content(); ?>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php get_sidebar('platform'); ?>
        </div>
    </main>

<?php
get_footer();
