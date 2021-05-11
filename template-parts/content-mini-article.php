<?php

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

<article class="article-mini">
    <a class="article-mini__image-wrap" href="<?=get_permalink();?>">
        <?php if(has_post_thumbnail()):?>
            <img src="<?=the_post_thumbnail_url('blog-large');?>" alt="<?=the_title();?>">
        <?php endif;?>
    </a>
    <div class="article-mini__caption">
      <a class="article-mini__link" href="<?=get_permalink();?>">
        <h3 class="article-mini__title"><?=the_title();?></h3>
      </a>
      <p class="article-mini__date"><?=$article_date;?></p>
    </div>
</article>
