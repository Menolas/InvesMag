<?php
/**
* Template part for displaying posts
*
*/

$terms = get_the_terms( $post->ID, 'rubrics' );
if( $terms ) :
    $term = array_shift( $terms );
endif;

$date1 = get_the_date('Y-m-d');
$current_date1 = date('Y-m-d', time());

$article_date = get_article_date($date1, $current_date1);

$nav_args = array(
    'before' => '<div class="page-links">',
    'after'  => '</div>',
    'next_or_number' => 'next_and_number',
    'nextpagelink' => __('>'),
    'previouspagelink' => __('<'),
    'echo' => 1,
);

$nav_args_desktop = array(
    'before' => '<div class="page-links">',
    'after'  => '</div>',
    'next_or_number' => 'next_and_number',
    'nextpagelink' => __('Следующая >'),
    'previouspagelink' => __('< Предыдущая'),
    'echo' => 1,
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="article-header">
            <div class="article-header__category">
                <a href="/rubrics/<?=$term->slug;?>">
                    <?=$term->name;?>
                </a>
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
        ); ?>

        <div class="page-links__block  page-links__block--mobile">
            <?php wp_link_pages($nav_args); ?>
        </div>

        <div class="page-links__block  page-links__block--desktop">
            <?php wp_link_pages($nav_args_desktop); ?>
        </div>
       
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
