<?php

$date1 = get_the_date('Y-m-d');
$current_date1 = date('Y-m-d', time());

$article_date = get_article_date($date1, $current_date1);

$terms = get_the_terms($post->ID, 'rubrics');

if($terms) {
  
    foreach ($terms as $i => $term) {
      if ($term->name === 'Новости') {
        unset($terms[$i]);
      }
    }

    $term = array_shift($terms);

} else { 
  $term = '';
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
        <h3 class="title__third  article-mini__title"><?=the_title();?></h3>
      </a>
      <footer class="article-mini__footer">
          <span class="article-mini__date"><?=$article_date;?></span>

          <?php if ($term != '') : ?>
            
            <a class="article-mini__term" href="/rubrics/<?=$term->slug;?>">
                <?=$term->name;?>
            </a>
            
          <?php endif; ?>
      </footer>
    </div>
</article>
