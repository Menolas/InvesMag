// сетка элементов

jQuery(document).ready(function ($) {

	$blocks = $('.news-section__item--3');

	if ($blocks.length % 3 > 1) {

		$dancing = $('.news-section__item--3:last-child');
		$dancing.css("margin-left", "30px");
		$dancing.css("margin-right", "auto");
	}

	// чистка от пустых тегов p

	$('p').filter(function(){
	   return this.innerHTML == '&nbsp;';
	}).remove();
});
