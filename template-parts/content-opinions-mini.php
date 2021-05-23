<?php

$columnist = get_field('name');

$columnist_name  = get_the_title($columnist);
$name_array = explode(" ", $columnist_name);


?>
 
<article class="opinion-mini">
     <a class="opinion-mini__link" href="<?=get_permalink();?>">
         <div class="opinion-mini__inner-wrap">
             <div class="opinion-mini__img-wrap">
                 <?php if(has_post_thumbnail($columnist)):?>
                     <?=get_the_post_thumbnail($columnist, 'portret');?>
                 <?php endif;?>
             </div>
        
             <div class="opinion-mini__caption">
               <h3 class="title__third  opinion-mini__title">
                    <span class="opinion-mini__name"><?=$name_array[0];?></span>
                    <span class="opinion-mini__family-name"><?=$name_array[1];?></span>
                </h3>
                
               <p class="opinion-mini__who"><?=get_the_excerpt($columnist);?></p>
             </div>
         </div>
         <p class="opinion-mini__excerpt"><?=the_excerpt(); ?></p>
     </a>
</article>
 