<?php
/**
 * Template part for displaying posts
 *
 */

$date1 = get_the_date('Y-m-d');
$current_date1 = date('Y-m-d', time());

$days = dateDifference($date1, $current_date1);

if ($days > 3) {
  $article_date = get_the_date('j F');
}

if ($days == 1) {
  $article_date = 'Вчера';
}

if ($days > 1  && $days <= 3) {
  $article_date = $days . ' дня назад';
}

if ($days == 0) {
  $article_date = 'Сегодня';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="article-header">
            <div class="article-header__category">
                <?=get_the_term_list($post->ID, 'rubrics');?>
            </div>
            <p class="article-header__date"><?=$article_date;?></p>
            
            

            <div class="article-header__share-link">
                Поделиться
                <span>
                    <svg>
                        <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#share"></use>
                    </svg>
                </span>
                <?php get_template_part('./template-parts/content', 'share-social'); ?>

            </div>

        </div>
        <?php if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url( get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif; ?>
    </header>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'investmag' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            )
        );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'investmag' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div>
    <footer class="article-footer">
        <div class="article-footer__author">
            Текст:&nbsp;&nbsp; <?=get_post_meta($post->ID, 'author', true);?>
        </div>
        <?php if (get_the_tag_list()) : ?>
            <div class="article-footer__topic-links">
            <?php echo get_the_tag_list('<span>Темы:&nbsp;&nbsp; ', '&nbsp;&nbsp;&nbsp;', '</span>'); ?>
            </div>
        <?php endif; ?>
    </footer>
</article>
