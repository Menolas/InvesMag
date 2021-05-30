<?php

$terms = get_the_terms( $post->ID, 'rubrics' );

if($terms) {

    foreach ($terms as $i => $term) {
        if ($term->name === 'Новости') {
            unset($terms[$i]);
        }
    }

    $term = array_shift($terms); ?>

    <div class="article-header__category">
        <a href="/rubrics/<?=$term->slug;?>">
            <?=$term->name;?>
        </a>
    </div>
<?php }


                