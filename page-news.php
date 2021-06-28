<?php
/**
 * The template for displaying page "Новости"
 *
 */

get_header();

?>

<main id="primary" class="site-main  <?=$background_banner ? 'background-banner__page' : ''?>">
    <div class="container">
        <div class="site-main__inner-wrap">
            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', 'page' );

            endwhile;
            ?>
        </div>
    </div>

</main>

<?php

get_footer();
