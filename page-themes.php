<?php
/**
 * The template for displaying all pages
 *
 */

get_header();

?>
    <main class="site-main  themes">
        <div class="container">
                <?php
                while ( have_posts() ) : the_post();

                    the_title('<h1 class="entry-title">', '</h1>'); ?>

                    <div class="entry-content">

                        <?php the_content(); ?>
                    </div>

                <?php endwhile; ?>
        </div>

    </main>

<?php
get_footer();
