<?php

$date1 = get_the_date('Y-m-d');
$current_date1 = date('Y-m-d', time());

$article_date = get_article_dateY($date1, $current_date1);

$info = get_field('info-off', $post->ID);
$author = get_field('article-author', $post->ID);

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

$content = apply_filters( 'the_content', get_the_content() );

//$content = preg_replace('/\"([^\"]*)\"/ismU','&bdquo;$1&ldquo;', $content);

$title = get_the_title();
$title = preg_replace('/\"([^\"]*)\"/ismU','&bdquo;$1&ldquo;', $title)


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
        <h1 class="entry-title"><?=$title;?></h1>
    </header>
    <div class="entry-content">
    
        <?=$content;?>
       

        <?php if (!$info) : ?>
            <footer class="article-footer">
                <div class="article-footer__author">
                    Текст:&nbsp;&nbsp;&nbsp; 
                    <?php if ($author) { ?>
                            <?=the_author_meta('first_name');?>  <?=the_author_meta('last_name');?>
                          <?php } else {
                            echo 'investmag.pro';
                          }
                    ?>
                </div>
                <?php if (get_the_tag_list()) : ?>
                    <div class="article-footer__topic-links">
                    <?php echo get_the_tag_list('<div>Темы:&nbsp;&nbsp;&nbsp; ', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '</div>'); ?>
                    </div>
                <?php endif; ?>
            </footer>
        <?php endif; ?>
    </div>

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
