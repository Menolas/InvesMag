<?php

$columnist = get_field('name');

?>

<div class="opinion-mini__inner-wrap  columnist">
	<div class="opinion-mini__img-wrap">
		<?=get_the_post_thumbnail($columnist, 'portret');?>
	</div>
	<div class="opinion-mini__caption">
		<h3 class="title__third  opinion-mini__title">
			<?=get_the_title($columnist);?>
		</h3>
		<p class="opinion-mini__who">
			<?=get_the_excerpt($columnist);?>
		</p>
	</div>
	<a class="opinion-mini__link" href="/opinions">
		Все мнения
	</a>
</div>

