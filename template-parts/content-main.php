<?php

$date1 = get_the_date('Y-m-d');
$current_date1 = date('Y-m-d', time());

$article_date = get_article_date($date1, $current_date1);

$info = get_field('info-off', $post->ID);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="article-header">
            <?php get_template_part('template-parts/section', 'article-header-category'); ?>
            <p class="article-header__date"><?=$article_date;?></p>

            <button class="article-header__share-link">
                Поделиться
                <span>
                    <svg>
                        <use xlink:href="/wp-content/themes/InvestMag/img/svg/sprite.svg#share"></use>
                    </svg>
                </span>
            </button>
            <?php get_template_part('./template-parts/content', 'share-social'); ?>
        </div>

        <?php the_title('<h1 class="entry-title">', '</h1>');?>
    </header>
    <div class="entry-content">
    
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'investmag'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );

        if (!$info) : ?>
            <footer class="article-footer">
                <div class="article-footer__author">
                    Текст:&nbsp;&nbsp;&nbsp; <?=get_post_meta($post->ID, 'author', true);?>
                </div>
                <?php if (get_the_tag_list()) : ?>
                    <div class="article-footer__topic-links">
                    <?php echo get_the_tag_list('<div>Темы:&nbsp;&nbsp;&nbsp; ', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '</div>'); ?>
                    </div>
                <?php endif; ?>
            </footer>
        <?php endif; ?>
    </div>
</article>
