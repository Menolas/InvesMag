<?php
/**
* Template part for displaying posts
*
*/

$date1 = get_the_date('Y-m-d');
$current_date1 = date('Y-m-d', time());

$article_date = get_article_date($date1, $current_date1);

$info = get_field('info-off', $post->ID);

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
    'nextpagelink' => __('Следующая'),
    'previouspagelink' => __('Предыдущая'),
    'echo' => 1,
);

update_field('author', 'investmag.pro');

$banner_inpage_mobile_after_post = get_posts(array(
    'numberposts' => 1,
    'post_type' => 'partners',
    'meta_query' => [
        [
            'key' => 'switch-banner',
            'value' => 1,
            'compare' => 'LIKE'
        ],
        [
            'key' => 'position',
            'value' => 'mobile-inpage-after-post',
            'compare' => 'LIKE'
        ]
    ]
));

$banner_desktop_inpage_after = get_posts(array(
    'numberposts' => 1,
    'post_type' => 'partners',
    'meta_query' => [
        [
            'key' => 'switch-banner',
            'value' => 1,
            'compare' => 'LIKE'
        ],
        [
            'key' => 'position',
            'value' => 'desktop-inpage-after-post',
            'compare' => 'LIKE'
        ]
    ]
));

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

    <?php if (!$info) : ?>
        <footer class="article-footer">
            <div class="article-footer__author">
                Текст:&nbsp;&nbsp;&nbsp; <?=the_author_meta('user_login');?>
            </div>
            <?php if (get_the_tag_list()) : ?>
                <div class="article-footer__topic-links">
                <?php echo get_the_tag_list('<span>Темы:&nbsp;&nbsp;&nbsp; ', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '</span>'); ?>
                </div>
            <?php endif; ?>
        </footer>
    <?php endif; ?>

    <?php if ($banner_inpage_mobile_after_post) : ?>

        <div class="banner  banner--mobile  banner--inpage-after">
            
                <?php if (get_field('script', $banner_inpage_mobile_after_post[0]->ID)) :
                    echo get_field('script', $banner_inpage_mobile_after_post[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_inpage_mobile_after_post[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_inpage_mobile_after_post[0]->ID)?>">
                        </a>
                <?php endif; ?>
           
        </div>

    <?php endif; ?>

    <?php if ($banner_desktop_inpage_after) : ?>

        <div class="banner  banner--desktop  banner--inpage  banner--inpage-after">
            
                <?php if (get_field('script', $banner_desktop_inpage_after[0]->ID)) :
                    echo get_field('script', $banner_desktop_inpage_after[0]->ID);
                    else : ?>
                        <a href="<?=get_field('banner-url', $banner_desktop_inpage_after[0]->ID)?>">
                            <img src="<?=get_field('banner-img', $banner_desktop_inpage_after[0]->ID)?>">
                        </a>
                <?php endif; ?>
           
        </div>

    <?php endif; ?>

</article>
