<?php

$terms = get_terms ([
    'taxonomy' => 'rubrics',
    'exclude' => ['38'],
    'orderby'      => 'description',
    'order'        => 'ASC',
    'meta_query' => [
        [
            'key' => 'show-in-menu-and-in-section',
            'value' => 1,
        ],
    ],
]);

?>

<div class="news-categories">
    <ul class="news-categories__list">
        <?php if($terms):
            foreach($terms as $term): ?>
            
                    <?php $link = get_term_link($term, $taxonomy = 'rubrics'); ?>
                    
                    <?php $current = ($_SERVER['REQUEST_URI'] == parse_url($link, PHP_URL_PATH)) ? 'current' : ''; ?>
                    
                    <li class="news-categories__item <?=$current;?>">
                        <a class="news-categories__link" href="<?=$link;?>">
                            <?=$term->name;?>
                        </a>
                    </li>

            <?php endforeach;
        endif; ?>
    </ul>
</div>
