<?php

$columnist = get_field('name');

$terms = get_the_terms( $post->ID, 'rubrics' );
if( $terms ) :
    $term = array_shift( $terms );
endif;

$date1 = get_the_date('Y-m-d');
$current_date1 = date('Y-m-d', time());

$article_date = get_the_date('j F Y');

$info = get_field('info-off', $post->ID);

?>

<article id="post-<?php the_ID(); ?>" class="single-opinion">
    <header class="entry-header">
        <div class="article-header">
            <div class="article-header__category">
                <a href="/rubrics/<?=$term->slug;?>">
                    <?=$term->name;?>
                </a>
            </div>
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
        <?php the_content(
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
        ); ?>
    </div>
    
    <?php if (!$info) : ?>
        <footer class="article-footer">
            <?php if (get_the_tag_list()) : ?>
                <div class="article-footer__topic-links">
                <?php echo get_the_tag_list('<span>Темы:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '</span>'); ?>
                </div>
            <?php endif; ?>
        </footer>
    <?php endif; ?>
</article>
