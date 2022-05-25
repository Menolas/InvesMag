<?php

$terms = get_the_terms( $post->ID, 'rubrics' );

// $term_primary_id = (int) get_post_meta( get_the_ID(), '_yoast_wpseo_primary_category', true );
// $term = get_term( $term_primary_id, 'rubrics' );
// $mainCategory = '<a href="' . get_term_link( $term ) . '" title="' . $term->name . '">' . $term->name . '</a>';
// echo $mainCategory;
// die();

if($terms) : ?>

    <?php if (count($terms) > 1) : ?>
        <?php foreach ($terms as $i => $term) : ?>
          <?php if ($term->name === 'Новости' || $term->name === 'Статьи') :
            unset($terms[$i]);
          endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (count($terms) >= 1) : ?>

        <?php $term = array_shift($terms); ?>
          <div class="article-header__category">
            <a href="/rubrics/<?=$term->slug;?>">
                <?=$term->name;?>
            </a>
          </div>
    <?php endif; ?>
<?php endif;
                